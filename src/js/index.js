import { render } from "@wordpress/element";
import Widget from "./Widget";

/**
 * Styles
 */
import "../css/main.css";

const App = () => {
  return <Widget />;
};

// Render the widget
render(<App />, document.getElementById("hundred-days-dashboard-widget"));
