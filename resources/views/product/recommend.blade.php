<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Recommendations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Recommended Products</h1>
        <div class="row">
            @if(isset($products) && count($products) > 0)
                @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <!-- Product Name -->
                                <h5 class="card-title">{{ $product[0] }}</h5>
                                
                                <!-- Ingredients (cleaning up newlines and array-like string) -->
                                <p class="card-text">
                                    Ingredients: {{ trim(preg_replace('/[\r\n]+/', ' ', strip_tags($product[1]))) }}
                                </p>

                                <!-- Skin Type (implode array into a string) -->
                                <p class="card-text">
                                    Skin Type: {{ is_array($product[2]) ? implode(', ', $product[2]) : $product[2] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No recommendations found.</p>
            @endif
        </div>
    </div>
</body>
</html>
