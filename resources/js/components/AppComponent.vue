<template>
    <div>
        <p>This is my app component's template.</p>
        {{ message }}
    </div>
</template>
<script>
    export default {
        data() {
            return {
                message: "hello world"
            }
        }
    }
</script>
