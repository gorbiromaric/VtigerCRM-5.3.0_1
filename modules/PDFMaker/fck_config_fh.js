CKEDITOR.editorConfig = function( config )
{
    config.toolbar = 'HeaderToolbar';

    config.toolbar_HeaderToolbar =
    [
        ['Source','-','NewPage','Preview','-','Templates'],
        ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
        ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
        ['BidiLtr', 'BidiRtl'],
        '/',
        ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
        ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
        ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
        ['Image','Table','HorizontalRule','Smiley','SpecialChar'],
        '/',
        ['Styles','Format','Font','FontSize'],
        ['TextColor','BGColor'],
        ['Maximize', 'ShowBlocks','-','About']
    ];
    config.height = '200';
    config.width = '1100';
};
