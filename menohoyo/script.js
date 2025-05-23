const imagePaths = [
    "images/hoyo1.jpg",
    "images/hoyo2.jpg",
    "images/hoyo3.jpg",
    "images/hoyo4.jpg",
    "images/hoyo5.jpg"
];

let currentIndex = 0;
const imgElement = document.getElementById("watame-img");

function changeImage() {
    imgElement.classList.remove("fade-in");
    imgElement.classList.add("fade-out");

    setTimeout(() => {
        currentIndex = (currentIndex + 1) % imagePaths.length;
        imgElement.src = imagePaths[currentIndex];

        imgElement.classList.remove("fade-out");
        imgElement.classList.add("fade-in");
    }, 1000); // アニメーション時間と一致
}

// 初期表示アニメーション
imgElement.classList.add("fade-in");

// スライドショー開始
setInterval(changeImage, 5000);