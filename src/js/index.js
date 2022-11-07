import { render } from "@wordpress/element";
import Widget from "./Widget";

const App = () => {
  return <Widget />;
};

// Render the widget
render(<App />, document.getElementById("hundred-days-dashboard-widget"));
