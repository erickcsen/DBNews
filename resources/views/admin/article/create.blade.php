@extends('admin.layouts.main')
@section('content')
    <!-- Untuk Upload File PopUp -->
    <script>
        let temp_id = "";
        let temp_info_id = "";
        function check_isi_file(){
            const reader = new FileReader();
            const files = document.getElementById('file-input').files;
            const file = (files.length > 0) ? files[0] : null;

            if (file) {
                reader.readAsDataURL(file);
    
                // Once the file has been loaded, fire the processing
                reader.onloadend = function(e) {
                    const preview = document.createElement('img');
    
                    if (isValidFileType(file)) {
                        preview.src = e.target.result;
                        preview.style.maxWidth = "100%"
                        preview.style.maxHeight = "500px"
                        
                        // Apply styling
                        preview.classList.add('preview-image');
                        const previewContainer = document.getElementById('preview-container');
                        previewContainer.innerHTML = ""; // Untuk 1 Files
                        previewContainer.appendChild(preview);
                        dropArea.hidden = true;
                        clear_upload_photo.hidden = false;
                    } else {
                        document.getElementById('preview-container').innerHTML = ""; // Untuk 1 Files
                        document.getElementById('drop-area').hidden = false;
                        document.getElementById('clear_upload_photo').hidden = true;
                    }
                };            
            } else {
                document.getElementById('preview-container').innerHTML = ""; // Untuk 1 Files
                document.getElementById('drop-area').hidden = false;
                document.getElementById('clear_upload_photo').hidden = true;
            }
        }
        function button_open_popup_file(input_id, info_id, element_input, element_text_info){
            temp_id = input_id;
            temp_info_id=info_id;
            popup_file.hidden = false;
            element_input.setAttribute('id','file-input');
            check_isi_file();
            element_text_info.setAttribute('id','upload_info_gambar')
        }
    </script>
    <!-- Untuk Upload File PopUp -->
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Article Data</div>
                            <a href="{{ route('article.index') }}" class="btn btn-primary btn-sm ml-auto">Back</a>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('article.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Article Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="article..">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea class="form-control" id="txtarea" name="description" placeholder="Article description..."></textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4">
                                        <label for="category_id">Category Name</label>
                                        <select class="form-control" name="category_id" onclick="event_category(this)"
                                            id="category_id">
                                            @foreach ($category as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4" id="subcategory_content" hidden>
                                        <label for="subcategory_id">Subcategory</label>
                                        <select class="form-control" name="subcategory_id" id="subcategory_id">
                                            <option value="">None Subcategory</option>
                                            @foreach ($subcategory as $subcategory)
                                                <option value="{{ $subcategory->id }}"
                                                    class="subcategory_item category_{{ $subcategory->category->id }}"
                                                    style="display: inline-block;">{{ $subcategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <script>
                                        function event_category(e) {
                                            let value = e.value;
                                            subcategory_id.value = "";
                                            subcategory_content.hidden = false;
                                            document.querySelectorAll('.subcategory_item').forEach(element => {
                                                console.log('jalan subcategory_item')
                                                element.style.display = 'none';
                                            });
                                            console.log(value);
                                            document.querySelectorAll('.category_' + value).forEach(element => {
                                                console.log('jalan')
                                                element.style.display = 'inline-block';
                                            });
                                        }
                                    </script>
                                    <div class="col-4 d-none">
                                        <label for="is_active">Status</label>
                                        <select class="form-control" name="is_active">
                                            <option value="publish">Publish</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Image</label>
                                    <a href="#popup_file" style="text-decoration: none;color:initial" onclick="button_open_popup_file('article_img', 'upload_info_gambar1', article_img, upload_info_gambar1)">
                                        <div class="col-12 border p-0 overflow-hidden rounded">
                                            <div class="d-inline-block border-end px-2 py-2">
                                                Choose File
                                            </div>
                                            <div id="upload_info_gambar1" class="d-inline-block ps-2">
                                                No Selected
                                            </div>
                                        </div>
                                    </a>
                                    <input type="file" id="article_img" name="article_img" onchange="insert_file_upload(this)" hidden>
                                </div>
                                <!-- Jika dua upload 
                                <div class="form-group">
                                    <label for="name">Image</label>
                                    <a href="#popup_file" style="text-decoration: none;color:initial" onclick="button_open_popup_file('article_img2', 'upload_info_gambar2', article_img2, upload_info_gambar2)">
                                        <div class="col-12 border p-0 overflow-hidden rounded">
                                            <div class="d-inline-block border-end px-2 py-2">
                                                Choose File
                                            </div>
                                            <div id="upload_info_gambar2" class="d-inline-block ps-2">
                                                No Selected
                                            </div>
                                        </div>
                                    </a>
                                    <input type="file" id="article_img2" name="" onchange="insert_file_upload(this)">
                                </div>
                                <!-- Jika dua upload -->
                                <div class="form-group">
                                    <div class="col-12 p-0">
                                        <label for="deskripsi_meta">Meta Deskripsi (Deskripsi Singkat)</label>
                                        <textarea name="deskripsi_meta" id="deskripsi_meta" class="form-control" rows="3"
                                            placeholder="Meta Deskripsi" style="resize: none"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-12 p-0">
                                        <label for="kata_kunci_meta">Kata Kunci Meta (Tags)</label>
                                        <input name="kata_kunci_meta" id="kata_kunci_meta" onkeyup="tags_event(this)"
                                            class="form-control" placeholder="Masukkan Kata Kunci"
                                            style="resize: none" />
                                    </div>
                                    <div id="tags" class="col-12 p-0 pt-3 text-capitalize">
                                        <div class="d-none">
                                            <div class="d-inline">
                                                <div class="d-inline rounded-start px-2 py-1 fw-bold text-white"
                                                    style="background: gray; width:fit-content;">
                                                    Home
                                                </div>
                                                <div class="d-inline">
                                                    <svg width="23" height="31" xmlns="http://www.w3.org/2000/svg"
                                                        style="margin-top: -3.3px;margin-left:-1.5px">
                                                        <!-- Menggambar segitiga sama kaki dengan rotasi 30 derajat -->
                                                        <polygon points="15.5,10 30,30 1,30" fill="gray"
                                                            transform="rotate(90, 15.5, 15.5)" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="d-inline" style="margin-left:-20px;">
                                                <div class="d-inline rounded-start px-2 py-1 fw-bold text-white"
                                                    style="background: gray; width:fit-content;">
                                                    Home
                                                </div>
                                                <div class="d-inline">
                                                    <svg width="23" height="31" xmlns="http://www.w3.org/2000/svg"
                                                        style="margin-top: -3.3px;margin-left:-1.5px">
                                                        <!-- Menggambar segitiga sama kaki dengan rotasi 30 derajat -->
                                                        <polygon points="15.5,10 30,30 1,30" fill="gray"
                                                            transform="rotate(90, 15.5, 15.5)" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        function tags_event(e) {
                                            let txt = e.value;
                                            let arry_txt = txt.split(",");
                                            tags.innerHTML = '';
                                            for (let i = 0; i < arry_txt.length; i++) {
                                                const txt = arry_txt[i];
                                                console.log(tags);
                                                tags.innerHTML += (txt != "") ? `
                                                <div class="d-inline-block mb-2 me-0 ms-0">
                                                    <div class="d-inline rounded px-2 py-1 fw-bold text-white" style="background: gray; width:fit-content;">
                                                        ` + txt + `
                                                    </div>
                                                </div>
                                            ` : "";
                                            }
                                        }
                                    </script>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Styling untuk Snackbar */
        .snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -145px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
            white-space: nowrap;
            padding: 16px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from { bottom: 0; opacity: 0; }
            to { bottom: 30px; opacity: 1; }
        }

        @keyframes fadein {
            from { bottom: 0; opacity: 0; }
            to { bottom: 30px; opacity: 1; }
        }

        @-webkit-keyframes fadeout {
            from { opacity: 1; }
            to { opacity: 0; }
        }

        @keyframes fadeout {
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
    <div id="popup_file" class="position-fixed top-0 bottom-0 start-0 end-0 pb-5 px-0"
        style="background-color: rgba(0, 0, 0, 0.5);z-index:2000;overflow-y:auto;" hidden>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 col-12 bg-white overflow-hidden rounded p-0 z-1"
                    style="margin-top: 30px;height:100%;">
                    <div class="col-12 bg-silver border-bottom py-3">
                        <button type="button" value="unggah"
                            class="btn btn-primary btn_tab_upload border"
                            onclick="btnTabUploadEvent(this)">
                            Unggah Baru
                        </button>
                        <button type="button" value="pilih"
                            class="btn btn-light btn_tab_upload border"
                            onclick="btnTabUploadEvent(this)">
                            Pilih File
                        </button>
                        <div class="float-end" style="margin-top: -5px">
                            <button type="button" onclick="closeBtnPopUp()" class="btn btn-light border">
                                <i class="fa fa-times text-muted"></i>
                            </button>
                        </div>
                    </div>
                    <div id="pilih_file" class="col-12 content_upload d-none p-0"
                        style="overflow:hidden;height:400px;">
                        <div class="col-12 mt-2 border-bottom pb-2">
                            <div class="float-left">
                                <select name="order_by" class="form-control pe-4">
                                    <option value="name desc">Urutkan berdasarkan terbaru
                                    </option>
                                    <option value="name asc">Urutkan berdasarkan terlama
                                    </option>
                                    <option value="size desc">Urutkan berdasarkan terbesar
                                    </option>
                                    <option value="size asc">Urutkan berdasarkan terkecil
                                    </option>
                                </select>
                            </div>
                            <div class="float-left">
                                <svg height="12pt"
                                    style="margin-left:-20px;margin-top:10px;"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="silver"
                                        d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                                </svg>
                            </div>
                            <div class="float-left">
                                <div class="mt-2 ms-4">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember"
                                            class="form-check-input">
                                        Hanya dipilih
                                    </label>
                                </div>
                            </div>
                            <div class="float-end">
                                <input type="text" class="form-control" placeholder="Cari Nama File">
                            </div>
                            <div class="col-12" style="clear: both"></div>
                        </div>
                        <div id="no_photo" class="text-center text-muted py-5">
                            <div style="transform:translateY(20%)">
                                <i class="fa fa-filter" style="font-size: 50px"></i>
                                <i class="fa fa-ban"
                                    style="font-size: 30px;margin-left:-15px"></i><br>
                                <span class="fw-bold" style="font-size: 14px">
                                    Tidak Ada Data
                                </span>
                            </div>
                        </div>
                        <div id="photo_list" class="border overflow-auto d-none"
                            style="height: 300px">
                            <button type="button"
                                class="btn btn-light z-1 border position-absolute d-md-none d-inline-block start-0"
                                style="margin-top:40%">
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                                </svg>
                            </button>
                            <button type="button"
                                class="btn btn-light z-1 border position-absolute d-md-none d-inline-block end-0"
                                style="margin-top:40%">
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 320 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                                </svg>
                            </button>
                            <div class="col-12">
                                <div class="row">
                                    {{-- @for ($i = 0; $i < 10; $i++) --}}
                                    <!--
                                        <div class="col-6 col-md-4 col-lg-3 p-0 border selected_file"
                                            onclick="selected_fileEvent(this)">
                                            <label class="w-100">
                                                <div class="position-absolute pt-2 ps-3">
                                                    <input type="radio"
                                                        name="file_selected">
                                                </div>
                                                <div class="col-12 border-bottom">
                                                    <center>
                                                        <img src="/images/favicon.png"
                                                            height="100px" alt="">
                                                    </center>
                                                </div>
                                                <div class="col-12">
                                                    <b>Nama 1</b> <br>
                                                    <small class="text-muted">
                                                        160 kb
                                                    </small>
                                                </div>
                                            </label>
                                        </div>
                                    <!-- -->
                                    {{-- @endfor --}}
                                    <div class="col-12 mb-3 d-none d-lg-inline-block">
                                    </div>
                                    <div class="col-12 mb-5 d-inline-block d-lg-none">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 bg-white position-absolute bottom-0 border-top pt-2">
                            <div class="float-start me-3 d-md-inline-block d-none">
                                0 File Terpilih <br>
                                <a href="#popup_file" class="text-decoration-none"> Hapus
                                </a>
                            </div>
                            <div class="d-md-inline-block d-none">
                                <button type="button"
                                    class="btn btn-light border disabled">
                                    Sebelumnya
                                </button>
                                <button type="button" class="btn btn-light border">
                                    Berikutnya
                                </button>
                            </div>
                            <div class="float-end">
                                <button class="btn btn-light border">
                                    Tambahkan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="unggah_file" class="col-12 content_upload d-inline-block p-0"
                        style="overflow-y:hidden;">
                        <div class="col-12" style="height:400px;overflow-y:auto;">
                            <style>
                                #drop-area {
                                    height: 250px;
                                    margin: 20px auto;
                                    text-align: center;
                                    border: 2px dashed #ccc;
                                    cursor: pointer;
                                }
                            </style>
                            <label for="file-input" class="w-100">
                                <div id="drop-area" class="col-12">
                                    <div style="margin-top:100px">
                                        Jatuhkan File disini <br>
                                        Tempel atau 
                                        <span class="text-primary">jelajahi</span>
                                    </div>
                                </div>
                            </label>
                            <div class="col-12 border">
                                <div class="position-absolute z-1 start-0 end-0 me-2">
                                    <div id="clear_upload_photo" class="float-right mt-2" hidden>
                                        <button onclick="clear_upload_photo_event()" type="button" class="btn btn-light border text-muted">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="preview-container" class="w-100 text-center"></div>
                            </div>
                            <script>
                                function insert_file_upload(e){
                                    if (e.value != ""){
                                        const preview = document.createElement('img');
                                        let file = event.target.files[0];
                                        
                                        const reader = new FileReader();
                                        reader.readAsDataURL(file);

                                        if (isValidFileType(file)) {
                                            reader.onloadend = function(e) {
                                                preview.src = e.target.result;
                                                preview.style.maxWidth = "100%"
                                                preview.style.maxHeight = "500px"
                                                
                                                // Apply styling
                                                preview.classList.add('preview-image');
                                                const previewContainer = document.getElementById('preview-container');
                                                previewContainer.innerHTML = ""; // Untuk 1 Files
                                                previewContainer.appendChild(preview);
                                                dropArea.hidden = true;
                                                clear_upload_photo.hidden = false;
                                            }
                                        } else {
                                            var snackbar = document.getElementById('snackbar');
                                            snackbar.className = 'snackbar show';
                                            fileInput.value = '';
                                            setTimeout(function() {
                                                snackbar.className = snackbar.className.replace('show', '');
                                            }, 3000); // Snackbar tampil selama 3 detik
                                        }
                                        /** */
                                    }
                                }
                                const dropArea = document.getElementById('drop-area');
                                const fileInput = document.getElementById('file-input');
                                // Utility function to prevent default browser behavior
                                function preventDefaults(e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                }

                                // Preventing default browser behavior when dragging a file over the container
                                dropArea.addEventListener('dragover', preventDefaults);
                                dropArea.addEventListener('dragenter', preventDefaults);
                                dropArea.addEventListener('dragleave', preventDefaults);

                                // Handling dropping files into the area
                                dropArea.addEventListener('drop', handleDrop);

                                dropArea.addEventListener('dragover', () => {
                                    dropArea.classList.add('drag-over');
                                });

                                dropArea.addEventListener('dragleave', () => {
                                    dropArea.classList.remove('drag-over');
                                });

                                function handleDrop(e) {
                                    e.preventDefault();

                                    // Getting the list of dragged files
                                    const files = e.dataTransfer.files;

                                    // Checking if there are any files
                                    if (files.length) {
                                        // Assigning the files to the hidden input from the first step
                                        fileInput.files = files;

                                        // Processing the files for previews (next step)
                                        handleFiles(files);
                                    }
                                }

                                // We’ll discuss `isValidFileType` function down the road
                                function isValidFileType(file) {
                                    return file.type.indexOf("image") > -1;
                                }

                                const placeholderIcon = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUKajWR4QvFYjH-3Te2gut72BdDa_zjHxwsQ&s';
                                function handleFiles(files) {
                                    for (const file of files) {
                                        // Initializing the FileReader API and reading the file
                                        const reader = new FileReader();
                                        reader.readAsDataURL(file);

                                        // Once the file has been loaded, fire the processing
                                        reader.onloadend = function(e) {
                                            const preview = document.createElement('img');

                                            if (isValidFileType(file)) {
                                                preview.src = e.target.result;
                                                preview.style.maxWidth = "100%"
                                                preview.style.maxHeight = "500px"
                                                
                                                // Apply styling
                                                preview.classList.add('preview-image');
                                                const previewContainer = document.getElementById('preview-container');
                                                previewContainer.innerHTML = ""; // Untuk 1 Files
                                                previewContainer.appendChild(preview);
                                                dropArea.hidden = true;
                                                clear_upload_photo.hidden = false;
                                            } else {
                                                var snackbar = document.getElementById('snackbar');
                                                snackbar.className = 'snackbar show';
                                                fileInput.value = '';
                                                setTimeout(function() {
                                                    snackbar.className = snackbar.className.replace('show', '');
                                                }, 3000); // Snackbar tampil selama 3 detik
                                            }
                                        };
                                    }
                                }
                                function clear_upload_photo_event(){
                                    const previewContainer = document.getElementById('preview-container');
                                    previewContainer.innerHTML = ""; // Untuk 1 Files
                                    document.getElementById('file-input').value = '';
                                    dropArea.hidden = false;
                                    clear_upload_photo.hidden = true;
                                }

                                function pilih_file_btn_popup(){
                                    popup_file.hidden=document.getElementById('file-input').value != '';
                                    upload_info_gambar.innerHTML=(document.getElementById('file-input').value != '')?'1 Selected':'No Selected';
                                    if (document.getElementById('file-input').value == '') {
                                        var snackbar = document.getElementById('snackbar2');
                                        snackbar.className = 'snackbar show';
                                        fileInput.value = '';
                                        setTimeout(function() {
                                            snackbar.className = snackbar.className.replace('show', '');
                                        }, 3000); // Snackbar tampil selama 3 detik
                                    }
                                    document.getElementById('file-input').setAttribute('id',temp_id);
                                    document.getElementById('upload_info_gambar').setAttribute('id',temp_info_id);
                                }
                            </script>
                            <div class="col-12 mb-5 pb-5"></div>
                        </div>
                        <div class="col-12 position-absolute w-100 bg-white border-top bottom-0 pt-2 text-end">
                            <button type="button" class="btn btn-ligth border" onclick="pilih_file_btn_popup()">
                                Pilih File
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="snackbar" class="d-none" style="margin-left:-120px;">File type tidak valid</div>
            <div id="snackbar2" class="d-none" style="margin-left:-120px;">Harus Masukkan File Gambar</div>
            <div class="row">
                <button type="button" onclick="closeBtnPopUp()" class="position-absolute top-0 left-0 right-0 bottom-0" style="background: none;border:0"></button>
            </div>
            <script>
                function closeBtnPopUp(){
                    document.getElementById('upload_info_gambar').innerHTML=(document.getElementById('file-input').value != '')?'1 Selected':'No Selected';
                    popup_file.hidden=true;
                    document.getElementById('file-input').setAttribute('id',temp_id);
                    document.getElementById('upload_info_gambar').setAttribute('id',temp_info_id);
                }
            </script>
        </div>
        <script>
            function btnTabUploadEvent(e) {
                let buttons = document.querySelectorAll('.btn_tab_upload');
                let content_upload = document.querySelectorAll('.content_upload');
                console.log(content_upload);
                buttons.forEach(button => {
                    button.classList.remove('btn-primary');
                    button.classList.add('btn-light')
                });
                content_upload.forEach(element => {
                    element.classList.remove('d-inline-block');
                    element.classList.add('d-none');
                });
                e.classList.toggle('btn-primary');
                e.classList.toggle('btn-light');
                if (e.value == "unggah") {
                    unggah_file.classList.toggle('d-none');
                    unggah_file.classList.toggle('d-inline-block');
                } else {
                    pilih_file.classList.toggle('d-none')
                    pilih_file.classList.toggle('d-inline-block');
                }
            }

            function selected_fileEvent(e) {
                let selected_file = document.querySelectorAll('.selected_file');
                selected_file.forEach(element => {
                    element.classList.remove('border-success');
                });

                e.classList.toggle('border-success');
            }
        </script>
    </div>
@endsection
