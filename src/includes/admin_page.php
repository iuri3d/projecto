<div class="container admin">
    <div class="top-row">
        <div class="create-product">
        <i class="fas fa-plus-circle"></i>
    </div>
    <div class="modal-create-product">
        <div class="modal">
            <div class="modal-container">
                <div class="modal-header">
                    <div class="modal-close">&times</div>
                </div>
                <div class="modal-body">
                    <form action="#" class="form-create-product" method="post">
                        <input type="text" name="productRef" id="productRef" placeholder="Referência">
                        <input type="text" name="productName" id="productName" placeholder="Nome">
                        <input type="text" name="productPrice" id="productPrice" placeholder="Preço">
                        <input type="text" name="productCategory" id="productCategory" placeholder="Categoria">
                        <textarea name="productDescription" id="productDescription" cols="10" rows="5" placeholder="Descrição"></textarea>
                        <input type="text" name="productStock" id="productStock" placeholder="Stock">
                        <input type="file" name="productImage" id="">
                        <button type="submit" class="button create-button">Criar</button>
                    </form>
                    
            </div>
            </div>
        </div>
    </div>
    <input type="text" class="page" placeholder="Pesquisar" >
    </div>
    

    <div class="verify-modal">
        <p>Tem a certeza que pretende eliminar este produto?</p>
        <div class="confirmation">
            <button class="button cancel">Cancelar</button>
            <button class="button delete">Apagar</button>
        </div>
        
    </div>
    <div class="product-list-table">
        
        <div class="list-header">
            <p class="col-m">Referência</p>
            <p class="col-m">Nome</p>
            <p class="col-s">Preço</p>
            <p class="col-m">Categoria</p>
            <p class="col-m">Descrição</p>
            <p class="col-m">Stock</p>            
        </div>
        <div class="list-body-container">
            
            <ul class="list-body">
                
            </ul>
        </div>
    </div>
</div>