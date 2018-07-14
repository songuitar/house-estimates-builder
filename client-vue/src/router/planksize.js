import PlankSizeList from '../components/planksize/List'
import PlankSizeCreate from '../components/planksize/Create'
import PlankSizeUpdate from '../components/planksize/Update'
import PlankSizeShow from '../components/planksize/Show'

export default [
  { name: 'PlankSizeList', path: '/plank_sizes/', component: PlankSizeList,
      meta: {
          sidebar: true,
          label: 'Части дома'
      }
  },
  { name: 'PlankSizeCreate', path: '/plank_sizes/create', component: PlankSizeCreate },
  { name: 'PlankSizeUpdate', path: '/plank_sizes/edit/:id', component: PlankSizeUpdate },
  { name: 'PlankSizeShow', path: '/plank_sizes/show/:id', component: PlankSizeShow }
]
