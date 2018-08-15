Vue.component("container-item-list-no-slide", {

    delimiters: ["${", "}"],

    props:
    {
        template:
        {
            type: String,
            default: "#vue-container-item-list-no-slide"
        },
        items:
        {
            type: Array,
            default: []
        }
    },

    created()
    {
        this.$options.template = this.template;
    },
});