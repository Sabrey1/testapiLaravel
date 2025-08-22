import { createI18n } from 'vue-i18n'
import en from './locales/en.json'
import kh from './locales/kh.json'

const i18n = createI18n({
  legacy: false, // use Composition API
  locale: 'en', // default language
  fallbackLocale: 'en',
  messages: {
    en,
    kh
  }
})

export default i18n
