<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add and Remove Input Tags</title>
    <style>
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div class="form-group">
            <input type="text" class="form-control">
            <button class="remove-btn" onclick="removeInput(this)">X</button>
        </div>
    </div>
    <button onclick="addInput()">Add Input</button>

    <script>
        function addInput() {
            const container = document.getElementById('container');
            const newInputGroup = document.createElement('div');
            newInputGroup.className = 'form-group';

            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control';

            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-btn';
            removeBtn.textContent = 'X';
            removeBtn.onclick = function() {
                removeInput(removeBtn);
            };

            newInputGroup.appendChild(newInput);
            newInputGroup.appendChild(removeBtn);

            container.appendChild(newInputGroup);
        }

        function removeInput(btn) {
            const formGroup = btn.parentElement;
            formGroup.remove();
        }
    </script>
</body>
</html>
