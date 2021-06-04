$(document).ready(function () {

    $(".btn-add").css("cursor", "not-allowed");
    $(".btn-add").css("background-color", "#66A8FF");

    $(".list-input").keyup(function () {
        if ($(this).val().length > 0) {
            $(".btn-add").css("cursor", "pointer");
            $(".btn-add").css("background-color", "#428EF5");
        } else {
            $(".btn-add").css("cursor", "not-allowed");
            $(".btn-add").css("background-color", "#66A8FF");
        }
    });

    todolist();
    var tasks = getData();

    $(".btn-add").click(function () {
        let item = $(".list-input");
        if (item.val().length > 0) {

            tasks.push({
                id: new Date().getTime(),
                name: item.val(),
                isCompleted: false
            });
            setData(tasks);
            alert(item.val() + " berhasil ditambahkan, total : " + tasks.length);
            location.reload();
        }else{
            alert("inputan tidak boleh kosong");
            $(".btn-add").css("cursor", "not-allowed");
            $(".btn-add").css("background-color", "#66A8FF");
        }
        item.val("");
        $(".btn-add").css("cursor", "not-allowed");
        $(".btn-add").css("background-color", "#66A8FF");

    });

    $('.items').on('click', 'button', function () {
        let id = $(this).attr('id');
        const task = tasks.find((task) => task.id === parseInt(id));
        $(this).parent().remove();
        alert(task.name + " berhasil dihapus");
        tasks = tasks.filter((task) => task.id !== parseInt(id));
        setData(tasks);
        $('.total').html(tasks.length);

    })

    $('.clear-btn').click(function () {
        console.log(localStorage.tasks);
        localStorage.removeItem("tasks");
        todolist();
        $('.total').html(0);
    })

    function getData() {
        let data = localStorage.getItem("tasks");
        if (data) {
            return JSON.parse(data);
        } else {
            return [];
        }
    }

    function setData(data) {
        localStorage.setItem('tasks', JSON.stringify(data))
    }

    function todolist() {
        tasks = getData();;

        var todolist = $(".list-items");
        todolist.empty();
        if (tasks != null) {
            tasks.forEach((task) => {

                todolist.append(`<div class='items'>
                                <div class='check-list'> 
                                    <a class='data' id="${task.id}">${task.name}</a>
                                </div> 
                                    <button id="${task.id}" class='remove-list'>HAPUS</button>
                            </div>`);
            });
            $('.total').html(tasks.length);
        }
    }
});





