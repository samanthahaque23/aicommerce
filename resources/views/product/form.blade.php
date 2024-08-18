<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Recommendation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling for compact cards */
        .card-body {
           
            overflow: auto; /* Enable scroll if content is too long */
            max-height: 200px; /* Set a maximum height for card content */
        }
        .card {
            margin-bottom: 20px;
            height: 350px; /* Set a fixed height for the card */
        }
        .card img {
            height: 150px; /* Adjust image height */
            object-fit: cover; /* Ensure the image covers the space */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Form should always be displayed -->
        <h1>Get Product Recommendations</h1>

        <!-- Form for product recommendations -->
        <form action="{{ route('product.recommend') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product name (optional)">
            </div>
            <div class="mb-3">
                <label for="skin_type" class="form-label">Skin Type</label>
                <input type="text" name="skin_type" class="form-control" id="skin_type" placeholder="Enter skin type">
            </div>
            <div class="mb-3">
                <label for="secondary_category" class="form-label">Secondary Category</label>
                <input type="text" name="secondary_category" class="form-control" id="secondary_category" placeholder="Enter secondary category">
            </div>
            <button type="submit" class="btn btn-primary">Get Recommendations</button>
        </form>

        <!-- Recommendations will be displayed below the form, but form stays visible -->
        @if(isset($products) && count($products) > 0)
            <h2>Recommended Products</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <!-- Display Product Name -->
                                <h6 class="card-title">{{ $product[0] }}</h6>
                                
                                <!-- Display Ingredients, wrapping text if necessary -->
                                {{-- <p class="card-text">
                                    Ingredients: {{ trim(preg_replace('/[\r\n]+/', ' ', strip_tags($product[1]))) }}
                                </p> --}}

                                <!-- Display Skin Type (handling array) -->
                                <p class="card-text">
                                    Skin Type: {{ is_array($product[2]) ? implode(', ', $product[2]) : $product[2] }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
