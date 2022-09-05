<div class="bg-white shadow-sm p-3 position-relative min-vh-100 " style="z-index: 1">
    <div class="p-6">
        <h4 class="fw-bold ">Salero</h4>
        <span class="small">Restaurant Admin</span>
    </div>

    <div class="">
        <div class="list-group fs-base">
            <a href="" class="list-group-item mb-4">
                <i class=" me-2 bi bi-house"></i>
                <span>Dashboard</span>
            </a>
            <a href="" class="list-group-item">
                <i class=" me-2 bi bi-journal-bookmark-fill"></i>
                <span>User list</span>
            </a>


            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button fs-base" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <i class=" me-2 bi bi-file-richtext"></i>
                            Posts
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <div class="list-group ">
                                <a href="{{route('post.index')}}" class="list-group-item">
                                    Posts
                                </a>
                                <a href="{{route('post.create')}}" class="list-group-item">
                                    Create Post
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button fs-base collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            <i class=" me-2 bi bi-file-richtext"></i>
                            Category
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <div class="list-group ">
                                <a href="{{route('category.index')}}" class="list-group-item">
                                    Category List
                                </a>
                                <a href="{{route('category.create')}}" class="list-group-item">
                                    Create Category
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="" class="list-group-item">
                <i class=" me-2 bi bi-people"></i>
               <span> Customer</span>
            </a>

        </div>
    </div>

</div>


