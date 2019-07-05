<template>
    <div>
        <span class="author" @click="makeDateVisible">{{ name }}</span>
        <span class="date" v-if="showDate">{{ dateString }}</span>
    </div>
</template>

<script>
    export default {
        name: "BlogDateComponent",
        props: ['name', 'dateString'],
        data: function() {
            return {
                showDate: false,
            }
        },
        methods: {
            makeDateVisible: function() {
                this.showDate = !this.showDate;
            }
        }
    }
</script>

<style scoped>
    .author {
        cursor: pointer;
        font-weight: bold;
    }
    .date {
        font-style: italic;
        opacity: 0.8;
    }
</style>