<div class="row">
      {!! Form::open(['url' => 'search','class'=>'col s12 card #fafafa grey lighten-4','files'=>true]) !!}
      <div class="center-align">
        <h6 class="flow-text upper-text">П о и с к</h6>
      </div>
      <div class="row">
        <div class="input-field col s12 m6 l3">
          <select id="city_id" name="city">
            <option value="" disabled selected>--Выберите--</option>
            @foreach($all_cities as $city)
            <option value="{{ $city->getId() }}">{{ $city->getName() }}</option>
            @endforeach
          </select>
          <label>Город</label>
        </div>
        <div class="input-field col s12 m6 l3">
          <select id="region_id" name="region">
            <option value="" disabled selected>--Выберите--</option>

            <option value="1">Option 1</option>

          </select>
          <label>Район</label>
        </div>
        <div class="input-field col s12 m6 l3">
          <select id="room_number" name="room_number">
            <option value="" disabled selected>--Выберите--</option>
            <option value="1" class="orange">1 комнатные</option>
            <option value="2">2 комнатные</option>
            <option value="3">3 комнатные</option>
          </select>
          <label>Комната</label>
        </div>
        <div class="input-field col s12 m6 l3 center-align">
          <button class="btn orange" type="submit" name="submit">
            Найти
          </button>
        </div>
      </div>
    {!! Form::close() !!}
  </div>
