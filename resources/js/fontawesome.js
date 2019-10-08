import { library, dom } from '@fortawesome/fontawesome-svg-core'
import { faCaretUp, faCaretDown, faStar, faCheck } from '@fortawesome/free-solid-svg-icons'

// We are only using the user-astronaut icon
library.add(faCaretUp, faCaretDown, faStar, faCheck)

// Replace any existing <i> tags with <svg> and set up a MutationObserver to
// continue doing this as the DOM changes.
dom.watch()