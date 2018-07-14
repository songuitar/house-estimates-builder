import PlankList from '../components/plank/List'
import PlankCreate from '../components/plank/Create'
import PlankUpdate from '../components/plank/Update'
import PlankShow from '../components/plank/Show'

export default [
  {
    name: 'PlankList',
    path: '/planks/',
    component: PlankList,
    meta: {
      sidebar: true,
      label: 'Доски'
    }
  },
  {name: 'PlankCreate', path: '/planks/create', component: PlankCreate},
  {name: 'PlankUpdate', path: '/planks/edit/:id', component: PlankUpdate},
  {name: 'PlankShow', path: '/planks/show/:id', component: PlankShow}
]
