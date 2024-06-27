<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
        </div>
        <div class="row">
            @foreach($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{$products->image}}" alt="{{$products->title}}" class="img-fluid">
                        </div>
                        <div class="detail-box">
                            <h6>{{$products->title}}</h6>
                            <h6>
                                Price
                                <span>Rs{{$products->price}}</span>
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between" style="padding: 10px;">
                            <a class="btn btn-success" href="{{ route('product_details', $products->id) }}">Details</a>
                            <a class="btn btn-primary" href="{{ route('add_cart', $products->id) }}">Add To cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .img-box {
        overflow: hidden; 
        border-radius: 8px; 
    }
    .img-box img {
        width: 100%; 
        height: auto; 
        transition: transform 0.3s ease; 
    }
    .img-box:hover img {
        transform: scale(1.1);
    }
</style>
