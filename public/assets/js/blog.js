const readMore=document.querySelectorAll('.read-more');

readMore.forEach(readMore => {
    readMore.addEventListener('click', () => {
        const extra = readMore.parentElement.querySelector('.extra');
        const readLink = readMore.parentElement.querySelector('.read-more');
        extra.style.display = 'block';
        readLink.style.display =  'none';
    });
});