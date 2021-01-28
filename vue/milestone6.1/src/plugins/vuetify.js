import Vue from 'vue';
import Vuetify from 'vuetify/lib/framework';

import colors from 'vuetify/lib/util/colors';


Vue.use(Vuetify);

// Colors used in Vuetify documentation.
export default new Vuetify({
    theme: {
        themes: {
            light: {
                primary: colors.red.darken1,
                secondary: colors.red.lighten4,
                accent: colors.indigo.base
            }
        }
    }
});
