document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".js_article_button_deleted").forEach(element => {
        element.addEventListener("click", (e) => fetchIdArticle(e))
    })
})

const fetchIdArticle = (e) => {
    let article_id = e.currentTarget.dataset.article_id;
    document.querySelector("#js_article_id").value = article_id;
}