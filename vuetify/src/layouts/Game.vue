<template>
    <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Medifit Games</title>
</head>
<body>

    <div class="main">

        <section class="content">
            <!--Элемент, который при отрисовке будет замененм на ваш view-->
            <slot/>
        </section>

    </div>

</body>
</html>

</template>

<script>



export default {
    data () {
    return {

    }
    },
    mounted() {

        },

    updated() {

        },
    methods: {

        },
}
</script>