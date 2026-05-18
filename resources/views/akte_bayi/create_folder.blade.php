@extends('layouts.app')

@section('content')
    <div class="container fade-in py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-4">
                    <a href="{{ route('akte-bayi.index') }}" class="btn btn-light rounded-circle me-3 border shadow-sm"
                        style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-arrow-left text-primary"></i>
                    </a>
                    <h1 class="mb-0">Tambah Akte Bayi (Per Folder)</h1>
                </div>

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4 p-md-5">
                        <div class="alert alert-info border-0 rounded-3 mb-4">
                            <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Panduan Upload Folder</h5>
                            <p class="mb-0 small">
                                Sistem membaca <strong>sub-folder</strong> di dalam folder utama yang Anda pilih sebagai nama bayi. Pastikan struktur folder Anda seperti ini:
                                <br><br>
                                <code>
                                📂 Folder Utama (Yang Dipilih)<br>
                                ┣ 📂 Budi Santoso<br>
                                ┃ ┣ 📄 akte_budi.pdf<br>
                                ┃ ┗ 🖼️ foto_budi.jpg<br>
                                ┗ 📂 Ani Lestari<br>
                                &nbsp;&nbsp;&nbsp;┗ 📄 akte_ani.pdf
                                </code>
                            </p>
                        </div>

                        <form id="folderUploadForm">
                            @csrf

                            <div class="row mb-4">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label for="tanggal_daftar" class="form-label fw-bold">Tanggal Daftar</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-calendar-alt text-muted"></i>
                                        </span>
                                        <input type="date"
                                            class="form-control border-start-0"
                                            id="tanggal_daftar" name="tanggal_daftar" value="{{ date('Y-m-d') }}"
                                            required>
                                    </div>
                                    <small class="text-muted d-block mt-1">Tanggal daftar ini akan diaplikasikan ke semua data di dalam folder.</small>
                                </div>
                            </div>


                            <div class="mb-5">
                                <label for="folder" class="form-label fw-bold">Pilih Folder Utama</label>
                                <div class="p-4 border-2 border-dashed rounded-3 text-center bg-light mb-2">
                                    <i class="fas fa-folder-open fa-3x text-muted mb-3 opacity-50"></i>
                                    <input type="file" class="form-control" id="folder" name="folder[]" webkitdirectory directory multiple required>
                                </div>
                                <div id="filePreview" class="mt-3 small text-muted" style="max-height: 200px; overflow-y: auto;">
                                    <!-- Preview files will be listed here -->
                                </div>
                            </div>

                            <div class="progress mb-4 d-none" id="uploadProgressContainer" style="height: 25px;">
                                <div id="uploadProgressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                            <div id="uploadStatus" class="mb-3 text-center text-primary fw-bold"></div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3 border-top">
                                <a href="{{ route('akte-bayi.index') }}" class="btn btn-light px-4 py-2 me-md-2" id="btnCancel">Batal</a>
                                <button type="submit" class="btn btn-primary px-5 py-2" id="btnSubmit">
                                    <i class="fas fa-upload me-2"></i>Mulai Upload
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const folderInput = document.getElementById('folder');
            const filePreview = document.getElementById('filePreview');
            const form = document.getElementById('folderUploadForm');
            const btnSubmit = document.getElementById('btnSubmit');
            const btnCancel = document.getElementById('btnCancel');
            const progressContainer = document.getElementById('uploadProgressContainer');
            const progressBar = document.getElementById('uploadProgressBar');
            const uploadStatus = document.getElementById('uploadStatus');

            folderInput.addEventListener('change', function(e) {
                filePreview.innerHTML = '';
                const files = e.target.files;
                if (files.length === 0) return;

                const fileList = document.createElement('ul');
                fileList.className = 'list-unstyled mb-0';
                
                let validFiles = 0;
                let babiesFound = new Set();

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    // Tampilkan beberapa file pertama sebagai preview
                    if (i < 10) {
                        const li = document.createElement('li');
                        li.innerHTML = `<i class="fas fa-file text-secondary me-2"></i>${file.webkitRelativePath}`;
                        fileList.appendChild(li);
                    }
                    
                    const pathParts = file.webkitRelativePath.split('/');
                    if (pathParts.length >= 3) {
                        validFiles++;
                        babiesFound.add(pathParts[1]); // Index 1 is sub-folder name
                    }
                }

                if (files.length > 10) {
                    const li = document.createElement('li');
                    li.className = 'text-primary mt-2 fw-bold';
                    li.textContent = `... dan ${files.length - 10} file lainnya.`;
                    fileList.appendChild(li);
                }

                const summary = document.createElement('div');
                summary.className = 'alert alert-success mt-2 p-2 mb-0';
                summary.innerHTML = `<strong>Ringkasan:</strong> Terdeteksi <strong>${babiesFound.size} data bayi</strong> dari <strong>${validFiles} file valid</strong>.`;
                
                filePreview.appendChild(fileList);
                filePreview.appendChild(summary);
            });

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const files = folderInput.files;
                if (files.length === 0) {
                    alert('Pilih folder terlebih dahulu!');
                    return;
                }

                const allowedExt = ['pdf', 'jpg', 'jpeg'];
                const tanggalDaftar = document.getElementById('tanggal_daftar').value;
                const token = document.querySelector('input[name="_token"]').value;

                // === Step 1: Group files by baby name (sub-folder) ===
                const babiesMap = {}; // { babyName: [File, File, ...] }

                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const ext = file.name.split('.').pop().toLowerCase();
                    if (!allowedExt.includes(ext)) continue;

                    const parts = file.webkitRelativePath.split('/');
                    if (parts.length < 3) continue; // Must be inside a sub-folder

                    const babyName = parts[1].trim();
                    if (!babiesMap[babyName]) babiesMap[babyName] = [];
                    babiesMap[babyName].push(file);
                }

                const babyNames = Object.keys(babiesMap);
                if (babyNames.length === 0) {
                    alert('Tidak ada file PDF/JPG yang valid ditemukan dalam sub-folder!');
                    return;
                }

                // === Step 2: Upload each baby one by one ===
                btnSubmit.disabled = true;
                btnCancel.classList.add('disabled');
                folderInput.disabled = true;
                progressContainer.classList.remove('d-none');

                let successCount = 0;
                let failedBabies = [];

                for (let i = 0; i < babyNames.length; i++) {
                    const babyName = babyNames[i];
                    const babyFiles = babiesMap[babyName];

                    // Update progress
                    const pct = Math.round(((i) / babyNames.length) * 100);
                    progressBar.style.width = pct + '%';
                    progressBar.textContent = pct + '%';
                    progressBar.setAttribute('aria-valuenow', pct);
                    uploadStatus.textContent = `Mengupload (${i + 1}/${babyNames.length}): ${babyName}...`;

                    // Build FormData for this single baby
                    const formData = new FormData();
                    formData.append('_token', token);
                    formData.append('tanggal_daftar', tanggalDaftar);
                    formData.append('baby_name', babyName);
                    for (let j = 0; j < babyFiles.length; j++) {
                        formData.append('files[]', babyFiles[j]);
                    }

                    // Send request and wait
                    try {
                        const result = await sendRequest('{{ route('akte-bayi.store-folder') }}', formData);
                        if (result.success) {
                            successCount++;
                        } else {
                            failedBabies.push(babyName + ': ' + (result.message || 'Error'));
                        }
                    } catch (err) {
                        failedBabies.push(babyName + ': ' + err);
                    }
                }

                // === Step 3: Done ===
                progressBar.style.width = '100%';
                progressBar.textContent = '100%';

                if (failedBabies.length === 0) {
                    uploadStatus.innerHTML = '<span class="text-success"><i class="fas fa-check-circle"></i> Berhasil! Mengalihkan...</span>';
                    setTimeout(() => { window.location.href = '{{ route('akte-bayi.index') }}'; }, 1000);
                } else {
                    uploadStatus.innerHTML = `<span class="text-warning"><i class="fas fa-exclamation-triangle"></i> ${successCount} berhasil, ${failedBabies.length} gagal: ${failedBabies.join('; ')}</span>`;
                    enableForm();
                }
            });

            // Helper: send XHR as a Promise
            function sendRequest(url, formData) {
                return new Promise(function(resolve, reject) {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', url, true);
                    xhr.onload = function() {
                        // Strip any PHP warnings before JSON
                        let raw = xhr.responseText;
                        const jsonStart = raw.indexOf('{');
                        if (jsonStart > 0) raw = raw.substring(jsonStart);
                        try {
                            resolve(JSON.parse(raw));
                        } catch (e) {
                            reject('JSON parse error: ' + xhr.responseText.substring(0, 200));
                        }
                    };
                    xhr.onerror = function() { reject('Network error'); };
                    xhr.send(formData);
                });
            }

            function enableForm() {
                btnSubmit.disabled = false;
                btnCancel.classList.remove('disabled');
                folderInput.disabled = false;
                progressBar.classList.remove('progress-bar-animated');
            }
        });
    </script>
@endsection
