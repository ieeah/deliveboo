@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Register') }}

                        <div class="text-danger">tutti i campi sono richiesti</div>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante') }}
                                    *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" required min="5" max="255"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>


                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }} *</label>

                                <div class="col-md-6">

                                    <input id="email" type="email" max="255"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                    *</label>

                                <div class="col-md-6">

                                    <input id="password" required min="8" max="255" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">


                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirmation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }} *</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" required min="8" max="255" type="password"
                                        class="form-control" name="password_confirmation" onkeyup="password_check()">
                                    <span class="password-different">Le due password non combaciano</span>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Inserisci Indirizzo') }}
                                    *</label>

                                <div class="col-md-6">

                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required min="5" max="255">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="vat_number" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Partita Iva') }} *
                                </label>
                                <div class="col-md-6">
                                    <input id="vat_number" type="text"
                                        class="form-control @error('vat_number') is-invalid @enderror" name="vat_number"
                                        value="{{ old('vat_number') }}" required min="11" max="11">
                                    @error('vat_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @error('vat_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <p class="col-md-4 col-form-label text-md-right">
                                    {{ __('tipologia ristorante') }} *
                                </p>

                                <section>
                                    @foreach ($types as $type)
                                        <div class="d-inline-block @error('types') is-invalid @enderror">

                                            <input type="checkbox" name="types[]" id="type{{ $loop->iteration }}"
                                                value="{{ $type->id }}"
                                                @if (in_array($type->id, old('types', []))) checked @endif>

                                            <label class="col-form-label" for="type{{ $loop->iteration }}">
                                                {{ $type->name }}
                                            </label>

                                        </div>
                                    @endforeach

                                    @error('types')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </section>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function password_check() {
            const password = document.getElementById('password')
            const password_confirm = document.getElementById('password-confirm')
            const message = document.querySelector('.password-different')

            if (password.value !== password_confirm.value) {
                message.style.display = 'block'
            } else {
                message.style.display = 'none'
            }
        }
    </script>
@endsection
