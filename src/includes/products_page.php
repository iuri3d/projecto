<div class="container">
    <div class="searchBar">
        <input type="text" class="search" placeholder="Pesquisar">
        <div class="filter-favorites">
            <label for="favorites">Favoritos:</label>
            <input type="checkbox" name="favorites" id="check_fav">
        </div>
        <div class="filter-orderBy">
            <label for="orderBy">Ordernar por:</label>
            <select name="orderBy" id="orderBy">
                <option value="Asc">Preço Ascendente</option>
                <option value="Dsc">Preço Descendente</option>
            </select>
        </div>
        <button class="filter"><i class="fas fa-filter"></i>Filtrar</button>
    </div>
    <div class="productGrid" id="grid">
                
    </div>
</div>