document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".js_article_button_deleted").forEach(element => {
        element.addEventListener("click", (e) => fetchIdArticle(e))
    })
})

const fetchIdArticle = (e) => {
    let article_id = e.currentTarget.dataset.article_id;
    document.querySelector("#js_article_id").value = article_id;

    let modal = document.querySelector(".modal");
    modal.classList.replace('modal','active');

    let closeModal = document.querySelector('.modal_footer');
    closeModal.addEventListener('click', () => modal.classList.replace('active','modal'));
}

let mybutton = document.getElementById("topBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.documentElement.scrollTop = 0;
}