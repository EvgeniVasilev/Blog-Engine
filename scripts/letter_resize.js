(function () {
    var normal = document.getElementById('normal'), container = document.getElementById('articles'), medium = document.getElementById('medium'), large = document.getElementById('large');
    // mormal letters
    normal.onclick = function () {
        container.style.fontSize = '15px';
    };
    // medium letters
    medium.onclick = function () {
        container.style.fontSize = '16px';
    };
    // large letters
    large.onclick = function () {
        container.style.fontSize = '18px';
    };
}());