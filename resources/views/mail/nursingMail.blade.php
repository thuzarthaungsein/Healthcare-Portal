<div>    
    Name : {{$getComment->name}}  <br>
    furigana : {{$getComment->furigana}}  <br>
    postal : {{$getComment->postal}}  <br>
    division: {{$getComment->division}}  <br>
    city : {{$getComment->city}}  <br>
    phone : {{$getComment->phone}}  <br>
    mail : {{$getComment->mail}}  <br> 
    present : {{$getComment->present}}  <br> 
    relation : {{$getComment->relation}}  <br> 
    ttname : {{$getComment->ttname}}  <br> 
    sex : {{$getComment->sex}}  <br> 
    years : {{$getComment->years}}  <br> 
    nursing : {{$getComment->nursing}}  <br> 
    fect : {{$getComment->fect}}  <br>
    desire : {{$getComment->desire}}  <br> 
    hope : {{$getComment->hope}}  <br> 
    @if(isset($getComment->arr_reserve[$getComment->fav_id]))
      @if($getComment->arr_reserve[$getComment->fav_id] == true)
        Reservation : Yes <br> 
      @else 
        Reservation : No <br> 
      @endif
    @else
    Reservation : No <br> 
    @endif
    @if(isset($getComment->arr_document[$getComment->fav_id]))
      @if($getComment->arr_document[$getComment->fav_id] == true)
        Documentation : Yes <br> 
      @else 
      Documentation : No <br> 
      @endif
    @else
    Documentation : No <br> 
    @endif

</div>