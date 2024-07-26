document.addEventListener('DOMContentLoaded', function () {
    const fileUpload = document.querySelector('.file-upload');
    const profilePic = document.querySelector('.profile-pic');
    const uploadButton = document.querySelector('.upload-button');

    uploadButton.addEventListener('click', () => {
        fileUpload.click();
    });

    fileUpload.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profilePic.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
