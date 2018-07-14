import ElementList from '../components/element/List'
import ElementCreate from '../components/element/Create'
import ElementUpdate from '../components/element/Update'
import ElementShow from '../components/element/Show'

export default [
  { name: 'ElementList', path: '/elements/',
    component: ElementList ,
    meta: {
      sidebar: true,
      label: 'Части дома'
    }
  },
  { name: 'ElementCreate', path: '/elements/create', component: ElementCreate },
  { name: 'ElementUpdate', path: '/elements/edit/:id', component: ElementUpdate },
  { name: 'ElementShow', path: '/elements/show/:id', component: ElementShow }
]
