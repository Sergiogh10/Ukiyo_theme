import "./index.css";
import { Composition } from "remotion";
import { T_FADE_END } from "./BrowserSearch";
import { MyComposition } from "./Composition";

export const RemotionRoot: React.FC = () => {
	return (
		<>
			<Composition
				id="MyComp"
				component={MyComposition}
				durationInFrames={T_FADE_END + 6}
				fps={30}
				width={1080}
				height={1920}
			/>
		</>
	);
};
