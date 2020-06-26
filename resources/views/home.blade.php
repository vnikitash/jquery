<!-- Stored in resources/views/child.blade.php -->

@extends('layout')

@section('title', 'jQuery Test')

@section('content')
    <button class="btn btn-success" id="createRow">Create</button>

    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody id="contents">
        </tbody>
    </table>

    <div id="loader">Loading data...</div>


    <script>
        $(document).ready(function () {

            setInterval(function () {
                getAllItems();
                }, 10000);

            $("#createRow").click(function () {
                addRow();
            });
        });


        function getAllItems()
        {
            $.get('/test/json', function (res) {
                console.log(res);
                let len = res.length;

                $("#contents").empty();

                for(let i = 0; i < len; i++) {
                    buildRow(res[i].id, res[i].name)
                }

                $("#loader").hide();
            });
        }


        function removeItem(id)
        {
            $("#tr_" + id).hide();

            $.ajax({
                url: '/test/' + id,
                type: 'DELETE',
                success: function(result) {
                    $("#tr_" + id).remove();
                },
                error: function (result) {
                    console.log("error occurred while tried to operate he request");
                    $("#tr_" + id).show();
                }
            });
        }

        function updateItem(id)
        {
            let text = $("#title_" + id).text();
            $('#inp_' + id).val(text);
            $("#title_" + id + "_input").show();
            $("#btn_title_" + id + "_s").show();
            $("#btn_title_" + id).hide();
            $("#title_" + id).hide();
        }

        function submitUpdateItem(id)
        {
            let text = $('#inp_' + id).val();
            $("#title_" + id).text(text);
            $("#title_" + id + "_input").hide();
            $("#btn_title_" + id + "_s").hide();
            $("#btn_title_" + id).show();
            $("#title_" + id).show();
        }

        function randomInt(min, max) {
            return min + Math.floor((max - min) * Math.random());
        }

        function addRow()
        {
            let id = randomInt(2, 100000);

            let json = {
                name: "Test"
            };

            $.post('/test',json, function (res) {
                buildRow(res.id, res.name);
            });
        }

        function buildRow(id, name) {
            let html = '<tr id="tr_' + id + '">\n' +
                '            <td>' + id + '</td>\n' +
                '            <td id="title_' + id + '">' + name + '</td>\n' +
                '            <td id="title_' + id + '_input" style="display: none"><input class="form-control" id="inp_' + id + '"></td>\n' +
                '            <td id="btn_title_' + id + '"><button class="btn btn-warning" onclick="updateItem(' + id + ')">Update</button></td>\n' +
                '            <td style="display: none" id="btn_title_' + id + '_s"><button class="btn btn-success" onclick="submitUpdateItem(' + id + ')">Submit</button></td>\n' +
                '            <td><button class="btn btn-danger" onclick="removeItem(' + id + ')">Delete</button></td>\n' +
                '        </tr>';

            $("#contents").prepend(html);
        }

    </script>
@endsection


