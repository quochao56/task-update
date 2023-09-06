$(function() {
    const image = $('#image_show img');
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

$(function() {
    const imagePreview = $('#image-preview');
    const input = $('#uploads');
    const thumbInput = $('#images');

    input.on("change", (e) => {
        input.css('margin-bottom', '200');
        const files = e.target.files;
        if (files && files.length > 0) {
            imagePreview.empty(); // Clear existing thumbnails

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const imageName = file.name;

                // Create a new thumbnail element
                const thumbnail = $('<img>').attr('src', URL.createObjectURL(file));

                // Apply float: left and padding to the thumbnail image
                thumbnail.css('float', 'left');
                thumbnail.css('padding-left', '5px');

                // Append the thumbnail to the imagePreview div
                imagePreview.append(thumbnail);

                // Set the image name as the value of the hidden input field
                thumbInput.val(thumbInput.val() + imageName + ' '); // Append image names
            }
        }
    });

});

