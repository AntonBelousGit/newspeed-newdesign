<label class="check option ">
    <input class="check__input" type="checkbox" name="{{$item->type}}[]" value="{{$item->id}}">
    <span class="check__box"></span>
    <span class="text-r text-r-m"> {{ucfirst($item->value)}}</span>
</label>
