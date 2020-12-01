<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Replacement Piece Request</title>

        <script src="{{ mix('/js/app.js') }}" defer></script>
        
        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-8">
                        <h1 class="text-center">Replacement Piece Request</h1>
                        <p class="text-center">Fill out the contact information below and select up to three replacement pieces. We will notify you when the items you have selected are back in stock.</p>
                        <div id="message"></div>
                        <form id="request-form" class="card">
                            <p class="small">* fields required.</p>
                            @csrf
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail Address*</label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>
                            <div id="product-row-1" class="form-group row">
                                <div class="col-md">
                                    <label for="type1">Type*</label>
                                    <select id="type1" name="type1" class="form-control" required>
                                        <option selected disabled></option>
                                        @foreach($pieces as $piece)
                                        <option value="{{ $piece->id }}">{{ ucwords($piece->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="pattern1">Pattern*</label>
                                    <select id="pattern1" name="pattern1" class="form-control" required>
                                        <option selected disabled></option>
                                        @foreach($patterns as $pattern)
                                        <option value="{{ $pattern->id }}">{{ $pattern->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="quantity1">Quantity*</label>
                                    <input type="number" id="quantity1" name="quantity1" class="form-control" value="{{ old('quantity1') ? old('quantity1') : 1 }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <button class="btn btn-sm btn-secondary add-request" data-id="2"><strong>&#43;</strong> Add additional product</button>
                                </div>
                            </div>
                            <div id="product-row-2" class="form-group row" style="display:none;">
                                <div class="col-md">
                                    <label for="type2">Type</label>
                                    <select id="type2" name="type2" class="form-control">
                                        <option></option>
                                        @foreach($pieces as $piece)
                                        <option value="{{ $piece->id }}">{{ ucwords($piece->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="pattern2">Pattern</label>
                                    <select id="pattern2" name="pattern2" class="form-control">
                                        <option></option>
                                        @foreach($patterns as $pattern)
                                        <option value="{{ $pattern->id }}">{{ $pattern->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="quantity2">Quantity</label>
                                    <input type="number" id="quantity2" name="quantity2" class="form-control" value="{{ old('quantity2') }}">
                                </div>
                            </div>
                            <div class="form-group row" style="display: none;">
                                <div class="col">
                                    <button class="btn btn-sm btn-secondary add-request" data-id="3"><strong>&#43;</strong> Add additional product</button>
                                </div>
                            </div>
                            <div id="product-row-3" class="form-group row" style="display:none;">
                                <div class="col-md">
                                    <label for="type3">Type</label>
                                    <select id="type3" name="type3" class="form-control">
                                        <option></option>
                                        @foreach($pieces as $piece)
                                        <option value="{{ $piece->id }}">{{ ucwords($piece->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="pattern3">Pattern</label>
                                    <select id="pattern3" name="pattern3" class="form-control">
                                        <option></option>
                                        @foreach($patterns as $pattern)
                                        <option value="{{ $pattern->id }}">{{ $pattern->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md">
                                    <label for="quantity3">Quantity</label>
                                    <input type="number" id="quantity3" name="quantity3" class="form-control" value="{{ old('quantity3') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
