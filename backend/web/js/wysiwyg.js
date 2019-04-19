$(document).ready(function () {
    /** Editor: */
    $('.textarea').wysihtml5({
        toolbar: {
            "font-styles": true, //Font styling, e.g. h1, h2, etc.
            "emphasis": true, //Italics, bold, etc.
            "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers.
            "html": true, //Button which allows you to edit the generated HTML.
            "link": true, //Button to insert a link.
            "image": false, //Button to insert an image.
            "color": true, //Button to change color of font);
            "blockquote": true, // Blockquote
        }
    });
});