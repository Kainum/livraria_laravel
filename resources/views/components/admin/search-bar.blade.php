<form action="{{ $route }}" method="post" class="mb-3">
    @csrf
    <div class="sidebar-form">
    <div class="input-group">
        <input type="text" name="desc_filtro" class="form-control" style="width: 80% !important;" placeholder="Pesquisa...">
        <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-default">
            <i class="fa fa-search"></i>
        </button>
        </span>
    </div>
    </div>
</form>