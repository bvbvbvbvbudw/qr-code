document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('form-qr');
    const loading = document.getElementById('loading');
    const error = document.getElementById('error');
    const qrImage = document.getElementById('qr-image');

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    form.addEventListener('submit', function (e){
        e.preventDefault();
        sendRequest();

        const formData = new FormData(form);

        fetch('includes/generate.php', {
            method: 'POST',
            body: formData
        })
            .then(handleResponse)
            .then(updateQRImage)
            .catch(handleError);
    });

    function sendRequest(){
        loadingHandler(true);
        errorHandler('', false);
        qrImage.style.height = '0';
    }

    function handleResponse(response){
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        if (response.headers.get('content-type').indexOf('image') !== -1) {
            return response.blob();
        } else {
            return response.text().then(text => {
                throw new Error(text);
            });
        }
    }

    function updateQRImage(blob){
        loadingHandler(false);
        const imageUrl = URL.createObjectURL(blob);
        qrImage.src = imageUrl;
        qrImage.style.height = '160px';
    }

    function handleError(error){
        loadingHandler(false);
        errorHandler(error.message, true);
        console.error('There was a problem with the fetch operation:', error);
    }

    function loadingHandler(status){
        loading.style.display = status ? 'block' : 'none';
    }

    function errorHandler(errorMessage, status){
        error.style.display = status ? 'block' : 'none';
        error.innerHTML = errorMessage;
    }
});
