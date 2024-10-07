<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Log Activity Helper</title>
</head>

<body>
    <div class="container">
        <div>
            <h4>Raw Element</h4>
            <div>
                <h6>List</h6>
                <pre>{{ $list }}</pre>
            </div>
            <div>
                <h6>Table</h6>
                <pre>{{ $table }}</pre>
            </div>
            <div>
                <h6>List</h6>
                <pre>{{ $list }}</pre>
            </div>
            <div>
                <h6>Collapse</h6>
                <pre>{{ $collapse }}</pre>
            </div>
            <div>
                <h6>Flex</h6>
                <pre>{{ $flex }}</pre>
            </div>
            <div>
                <h6>Grid</h6>
                <pre>{{ $grid }}</pre>
            </div>
        </div>
        <div>
            {!! $list !!}
        </div>

        <div>
            {!! $table !!}
        </div>

        <div>
            {!! $collapse !!}
        </div>
        <div>
            {!! $flex !!}
        </div>
        <div>
            {!! $grid !!}
        </div>

        <h4>
            JavaScript Element
        </h4>
        <div>
            <h4>Raw Element</h4>
            <div>
                <h6>Badge</h6>
                <pre id="raw_badge"></pre>
            </div>
            <div>
                <h6>List</h6>
                <pre id="raw_list"></pre>
            </div>
            <div>
                <h6>Table</h6>
                <pre id="raw_table"></pre>
            </div>
            <div>
                <h6>Collapse</h6>
                <pre id="raw_collapse"></pre>
            </div>
            <div>
                <h6>Flex</h6>
                <pre id="raw_flex"></pre>
            </div>
            <div>
                <h6>Grid</h6>
                <pre id="raw_grid"></pre>
            </div>
        </div>
        <div>
            <h4>Formatted Element</h4>
            <div>
                <h6>List</h6>
                <div id="list"></div>
            </div>
            <div>
                <h6>Table</h6>
                <div id="table"></div>
            </div>
            <div>
                <h6>Collapse</h6>
                <div id="collapse"></div>
            </div>
            <div>
                {{-- <h6>Flex</h6> --}}
                <div id="flex"></div>
            </div>
            <div>
                {{-- <h6>Grid</h6> --}}
                <div id="grid"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="{{ asset('lib/tag-element-helper.js') }}"></script>
    <script>
        const tagHelper = new TagElementHelper();

        const list = ['Item 1', 'Item 2', 'Item 3', 'Item 4', 'Item 5'];
        const columns = ['Col 1', 'Col 2', 'Col 3', 'Col 4', 'Col 5'];
        const rows = [
            ['Row 1 Col 1', 'Row 1 Col 2', 'Row 1 Col 3', 'Row 1 Col 4', 'Row 1 Col 5'],
            ['Row 2 Col 1', 'Row 2 Col 2', 'Row 2 Col 3', 'Row 2 Col 4', 'Row 2 Col 5'],
            ['Row 3 Col 1', 'Row 3 Col 2', 'Row 3 Col 3', 'Row 3 Col 4', 'Row 3 Col 5'],
            ['Row 4 Col 1', 'Row 4 Col 2', 'Row 4 Col 3', 'Row 4 Col 4', 'Row 4 Col 5'],
            ['Row 5 Col 1', 'Row 5 Col 2', 'Row 5 Col 3', 'Row 5 Col 4', 'Row 5 Col 5'],
        ];
        const flex = tagHelper.createFlexRow('Flex', columns);
        const table = tagHelper.createTable('Table', columns, rows);
        const collapse = "{!! $collapse !!}";
        console.log('list', list);
        document.getElementById('raw_list').innerText = logActivityHelper.createList('List', list);
        document.getElementById('raw_table').innerText = logActivityHelper.createTable('Table', columns, rows);
        document.getElementById('raw_collapse').innerText = logActivityHelper.createBootstrapCollapse('Collapse', columns, rows);
        document.getElementById('raw_flex').innerText = logActivityHelper.createFlexRow('Flex', columns, rows);
        document.getElementById('raw_grid').innerText = logActivityHelper.createGridRow('Grid', columns, rows);

        document.getElementById('list').innerHTML = logActivityHelper.createList('List', list);
        document.getElementById('table').innerHTML = logActivityHelper.createTable('Table', columns, rows);
        document.getElementById('collapse').innerHTML = logActivityHelper.createBootstrapCollapse('Collapse', columns, rows);
        document.getElementById('flex').innerHTML = logActivityHelper.createFlexRow('Flex', columns, rows);
        document.getElementById('grid').innerHTML = logActivityHelper.createGridRow('Grid', 4, [list, table, collapse]);
    </script>
</body>

</html>