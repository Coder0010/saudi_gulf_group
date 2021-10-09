'use strict';

function createEditor(inputID, inputName = 'description') {
    if ($(`#${inputID}`).length) {
        new Quill(`#${inputID}`, {
            modules: {
                toolbar: quillToolbarOptions
            },
            placeholder: 'Words can be like x-rays if you use them properly...',
            theme: 'snow'
        });
        $("form").submit(function (e) {
            $(this).append(
                "<textarea name='"+ inputName +"' style='display:none'>"
                    + document.querySelector(`#${inputID}`).children[0].innerHTML +
                "</textarea>"
            );
        });
    }
}

$(document).ready(function () {
    window.quillToolbarOptions = [
        [{
            'header': [1, 2, 3, 4, 5, false]
        }],
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{
            'header': 1
        }, {
            'header': 2
        }],
        [{
            'list': 'ordered'
        }, {
            'list': 'bullet'
        }],
        [{
            'script': 'sub'
        }, {
            'script': 'super'
        }],
        [{
            'indent': '-1'
        }, {
            'indent': '+1'
        }],
    ];
    createEditor('description_editor')
    createEditor('welcome_section_description_editor')
    createEditor('coupon_section_description_editor')
    createEditor('story_section_description_editor')
    createEditor('service_section_description_editor')
    createEditor('portfolio_section_description_editor')

    if ($(".select-2").length) {
        $(".select-2").select2({ width: "100%" , maximumSelectionLength: 4 });
    }
});
