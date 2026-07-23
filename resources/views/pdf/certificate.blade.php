<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        @page { margin: 0; padding: 0; }
        body { margin: 0; padding: 0; width: {{ $pageWidth }}px; height: {{ $pageHeight }}px; position: relative; overflow: hidden; font-family: sans-serif; }
        .background { position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; }
        .background img { width: 100%; height: 100%; object-fit: fill; }
        @foreach ($fields as $field)
        .field-{{ $loop->index }} {
            position: absolute;
            left: {{ $field['x'] }}px;
            top: {{ $field['y'] }}px;
            width: {{ $field['width'] }}px;
            min-height: {{ $field['height'] }}px;
            font-size: {{ $field['font_size'] }}px;
            color: {{ $field['font_color'] }};
            font-weight: {{ $field['font_weight'] }};
            text-align: {{ $field['text_align'] }};
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: {{ $field['text_align'] === 'center' ? 'center' : ($field['text_align'] === 'right' ? 'flex-end' : 'flex-start') }};
            padding: 0 10px;
            box-sizing: border-box;
        }
        @endforeach
    </style>
</head>
<body>
    <div class="background">
        <img src="{{ $backgroundUrl }}" alt="">
    </div>
    @foreach ($fields as $field)
    <div class="field-{{ $loop->index }}">{{ $field['value'] }}</div>
    @endforeach
</body>
</html>
