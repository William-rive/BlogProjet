<div class="modal">
    <div class="modal_header">
        <h3 class="modal_title">Supprimer un article.</h3>
    </div>
    <div class="modal_body">
        <p>Voulez-vous supprimer cette article?
        Attention cette opération est définitive.</p>
    </div>
    <div class="modal_footer">
        <button class="btn_modal" type="button">Fermer</button>
        <form method="get">
            <input type="hidden" name="page" value="article_deleted">
            <input type="hidden" name="article_id" id="js_article_id">
            <input type="submit" value="Confirmer">
        </form>
    </div>
</div>