export default {
    methods: {
        arrToSpacedStr(val) {
            if (val instanceof Array) {
                return val.join(" ");
            }
            return val;
        }
    }
};
