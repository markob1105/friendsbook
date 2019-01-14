@extends ('layouts.master')

@section ('content')
  <div class="col-sm-8 container">
    <h1>Register</h1>
    <form method="POST" action="/register">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="surname">Surname:</label>
        <input type="text" class="form-control" id="surname" name="surname" required>
      </div>
      <div class="form-group">
        <label for="birth_date">Birth Date:</label>
        <input type="date" class="form-control" id="birth_date" name="birth_date" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="password_confirmation">Password Confirmation:</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Register</button>
      </div>

    </form>
  </div>
@endsection