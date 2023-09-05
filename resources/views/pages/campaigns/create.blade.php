@extends('layouts.app.dashboard', ['title' => 'Criar campanha'])

@section('header')
    <div class="row" x-data="header">
        <div class="col-md-10 offset-1 mb-3">
            <h1 class="py-3"><span x-text="salut"></span>, {{ decrypt_data(auth()->user()->firstname) }}</h1>
        </div>
    </div>

    <livewire:backoffice.app-navigation-component/>
@endsection

@section('content')
    <div class="container">
        <h1 class="mb-2">Criar uma nova campanha</h1>
        <div class="row">
        </div>
        <div class="row">
            <div id="app-campaign-creator">
                <p>Hello World</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p><br></p>
            </div>
        </div>
        <div class="row">
            <button id="app-campaign-btn-preview" class="btn btn-default">Preview</button>
        </div>
    </div>

    <section id="app-sidebar-preview" class="app-preview-hidden">
        <aside id="app-sidebar-preview-content">
            <h3>Pré-visualizar</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                A accusamus aspernatur blanditiis consequuntur culpa cum enim est fugit,
                ipsa ipsum itaque libero magnam nobis quae quibusdam quo similique totam vero?
            </p>
            <article id="app-sidebar-preview-content-code" class="mt-3"></article>
        </aside>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script type="text/javascript">
        const editor = new Quill('#app-campaign-creator', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ["bold", "italic", "underline", "strike"],
                    [
                        { font: [] },
                        { size: ["small", "large", "hurge", false]},
                        {
                            header: [1, 2, 3, 4, 5, 6, false]
                        },
                        { list: "order" }, { list: "bullet" },
                        { script: "sub" }, { script: "super" },
                        { ident: "1" }, { ident: "-1" },
                        { align: [false, "center", "right", "justify"] },
                        { color: []},
                        { background: [] },
                        ["image", "link", "video", "formula"]
                        ["code-block", "blockquote"]
                    ]
                ]
            }
        });

        document.getElementById('app-campaign-btn-preview').addEventListener("click", function () {
            document.getElementById('app-sidebar-preview-content-code').innerHTML = document.querySelector('#app-campaign-creator > div.ql-editor').innerHTML;
            document.getElementById('app-sidebar-preview').classList.remove('app-preview-hidden')
        });
    </script>
@endpush

