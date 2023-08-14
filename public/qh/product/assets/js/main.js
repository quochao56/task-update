$(function() {
    const image = $('img');
    const input = $('#upload'); // Selecting input by its ID "upload"
    const thumbInput = $('#thumb');

    input.on("change", (e) => {
        const file = e.target.files[0];
        if (file) {
            const imageName = file.name;
            image.attr('src', URL.createObjectURL(file));
            thumbInput.val(imageName); // Set the image name as the value of the hidden input field
        }
    });
});

