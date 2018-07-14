import WoodTypeList from '../components/woodtype/List'
import WoodTypeCreate from '../components/woodtype/Create'
import WoodTypeUpdate from '../components/woodtype/Update'
import WoodTypeShow from '../components/woodtype/Show'

export default [
  { name: 'WoodTypeList', path: '/wood_types/', component: WoodTypeList,
      meta: {
          sidebar: true,
          label: 'Части дома'
      }
  },
  { name: 'WoodTypeCreate', path: '/wood_types/create', component: WoodTypeCreate },
  { name: 'WoodTypeUpdate', path: '/wood_types/edit/:id', component: WoodTypeUpdate },
  { name: 'WoodTypeShow', path: '/wood_types/show/:id', component: WoodTypeShow }
]
