document.addEventListener("DOMContentLoaded", function() {
    var lightboxLinks = document.getElementsByClassName('lightbox-link');

    for (var i = 0; i < lightboxLinks.length; i++) {
        lightboxLinks[i].addEventListener('click', function(event) {
            event.preventDefault();

            var imageSrc = this.getAttribute('href');

            var lightbox = document.createElement('div');
            lightbox.className = 'lightbox';

            var lightboxImage = document.createElement('img');
            lightboxImage.className = 'lightbox-image';
            lightboxImage.src = imageSrc;

            lightboxImage.addEventListener('click', function() {
                lightbox.parentNode.removeChild(lightbox);
            });

            var lightboxClose = document.createElement('span');
            lightboxClose.className = 'lightbox-close';
            lightboxClose.innerHTML = '&times;';

            lightboxClose.addEventListener('click', function() {
                lightbox.parentNode.removeChild(lightbox);
            });

            lightbox.appendChild(lightboxImage);
            lightbox.appendChild(lightboxClose);

            document.body.appendChild(lightbox);
        });
    }
});
