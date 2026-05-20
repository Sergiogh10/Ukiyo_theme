import { Video } from "@remotion/media";
import {
	AbsoluteFill,
	Easing,
	Img,
	interpolate,
	Sequence,
	staticFile,
	useCurrentFrame,
} from "remotion";

const INTRO_TEXT = "lo que ves al inicio...";
const INTRO_FPC = 2;
const T_INTRO_TYPE_START = 8;
const T_INTRO_TYPE_END = T_INTRO_TYPE_START + INTRO_TEXT.length * INTRO_FPC;
const T_INTRO_HOLD_END = T_INTRO_TYPE_END + 14;
const T_INTRO_END = T_INTRO_HOLD_END + 10;
const OUTRO_TEXT = "lo que vives despues...";
const OUTRO_FPC = 2;
const CUT_START_FRAME = 12 * 30;
const CUT_LENGTH_FRAMES = 2 * 30;

export const URL_TEXT = "viajesukiyo.com";
export const CHARS = URL_TEXT.length;
export const FPC = 3;
export const T_FOCUS = 18;
export const T_TYPE_START = 26;
export const T_TYPE_END = T_TYPE_START + CHARS * FPC;
const T_HOLD_END = T_TYPE_END + 30;
export const T_MOVE_END = T_HOLD_END + 16;
const T_CONTENT_WHITE_START = T_MOVE_END;
const T_CONTENT_WHITE_END = T_CONTENT_WHITE_START + 8;
const T_WHITE_HOLD_END = T_CONTENT_WHITE_END + 8;
const T_VIDEO_PLAY_START = T_WHITE_HOLD_END;
const T_VIDEO_REVEAL_END = T_VIDEO_PLAY_START + 8;
const VIDEO_DURATION_FRAMES = 228;
const T_VIDEO_END = T_VIDEO_PLAY_START + VIDEO_DURATION_FRAMES;
const T_BROWSER_CLOSE_START = T_VIDEO_END;
const T_BROWSER_CLOSE_END = T_BROWSER_CLOSE_START + 12;
const T_WHITE_SCREEN_END = T_BROWSER_CLOSE_END + 8;
export const T_FADE_START = T_WHITE_SCREEN_END;
const T_TV_LINE_END = T_FADE_START + 7;
const T_TV_OFF_END = T_TV_LINE_END + 5;
const T_OUTRO_TYPE_START = T_TV_OFF_END + 8;
const T_OUTRO_TYPE_END = T_OUTRO_TYPE_START + OUTRO_TEXT.length * OUTRO_FPC;
const T_OUTRO_HOLD_END = T_OUTRO_TYPE_END + 12;
const T_OUTRO_FADE_END = T_OUTRO_HOLD_END + 12;
const T_BLACK_HOLD_FRAMES = 60;
const T_SEQUENCE_END = T_OUTRO_FADE_END + T_BLACK_HOLD_FRAMES;
const RAW_END_FRAME = T_INTRO_END + T_SEQUENCE_END;
export const T_FADE_END = RAW_END_FRAME - CUT_LENGTH_FRAMES;
const VIDEO_FILE_NAME = "screenrec.mov";
const TITLE_FONT = '"Rowdies", "Trebuchet MS", sans-serif';
const BODY_FONT = '"Satoshi", "SF Pro Text", ui-sans-serif, system-ui, sans-serif';

const clamp = {
	extrapolateLeft: "clamp" as const,
	extrapolateRight: "clamp" as const,
};

const BROWSER_WIDTH = 860;
const BROWSER_HEIGHT = 1380;
const ADDRESS_BAR_WIDTH = 650;
const CHAR_WIDTH = 18;
const TEXT_START_X = 140;
const SEARCH_BUTTON_CENTER_X = 716;
const SEARCH_BUTTON_CENTER_Y = 146;

type CardIconName = "calendar" | "compass" | "plane";

const infoCards: Array<{
	label: string;
	icon: CardIconName;
	copy: string;
	tone: string;
}> = [
	{
		label: "Descubre",
		icon: "compass",
		copy: "Planifica rutas, compara alojamientos y diseña un viaje con calma.",
		tone: "linear-gradient(135deg, rgba(219,234,254,0.95) 0%, rgba(255,255,255,0.96) 100%)",
	},
	{
		label: "Reserva",
		icon: "calendar",
		copy: "Hablamos y construimos juntos tu viaje.",
		tone: "linear-gradient(135deg, rgba(224,231,255,0.92) 0%, rgba(255,255,255,0.96) 100%)",
	},
	{
		label: "Viaja",
		icon: "plane",
		copy: "Disfruta del lugar, de su gente y su cultura de una manera mas humana, local y alejada del turismo masivo.",
		tone: "linear-gradient(135deg, rgba(236,253,245,0.92) 0%, rgba(255,255,255,0.96) 100%)",
	},
];

const CardIcon: React.FC<{icon: CardIconName}> = ({icon}) => {
	if (icon === "compass") {
		return (
			<svg viewBox="0 0 24 24" width={28} height={28} fill="none">
				<circle cx="12" cy="12" r="8" stroke="#2563eb" strokeWidth="1.8" />
				<path
					d="M14.8 9.2 13 13l-3.8 1.8L11 11l3.8-1.8Z"
					fill="#2563eb"
					stroke="#2563eb"
					strokeLinejoin="round"
				/>
			</svg>
		);
	}

	if (icon === "calendar") {
		return (
			<svg viewBox="0 0 24 24" width={28} height={28} fill="none">
				<rect
					x="4"
					y="6"
					width="16"
					height="14"
					rx="3"
					stroke="#4f46e5"
					strokeWidth="1.8"
				/>
				<path d="M8 4.5v3M16 4.5v3M4 10h16" stroke="#4f46e5" strokeWidth="1.8" />
				<path d="m9 14 2 2 4-4" stroke="#4f46e5" strokeWidth="1.8" strokeLinecap="round" strokeLinejoin="round" />
			</svg>
		);
	}

	return (
		<svg viewBox="0 0 24 24" width={28} height={28} fill="none">
			<path
				d="M21 10.5 13.8 13.2 11 20l-1.6-.4 1.1-5.8-5.9 1-.6-1.6 6.9-2.7L13.5 3h1.8l-1 5.8 5.3.1L21 10.5Z"
				fill="#059669"
				stroke="#059669"
				strokeLinejoin="round"
			/>
		</svg>
	);
};

export const BrowserSearch = () => {
	const renderFrame = useCurrentFrame();
	const frame =
		renderFrame >= CUT_START_FRAME
			? renderFrame + CUT_LENGTH_FRAMES
			: renderFrame;
	const mainFrame = Math.max(0, frame - T_INTRO_END);
	const introTypedCharacters = Math.min(
		INTRO_TEXT.length,
		Math.max(0, Math.floor((frame - T_INTRO_TYPE_START) / INTRO_FPC) + 1),
	);
	const introText = frame < T_INTRO_TYPE_START ? "" : INTRO_TEXT.slice(0, introTypedCharacters);
	const introOpacity =
		frame <= T_INTRO_HOLD_END
			? 1
			: interpolate(frame, [T_INTRO_HOLD_END, T_INTRO_END], [1, 0], {
					...clamp,
					easing: Easing.out(Easing.cubic),
				});
	const introCaretOpacity =
		frame >= T_INTRO_TYPE_START && frame <= T_INTRO_HOLD_END && Math.floor(frame / 8) % 2 === 0
			? 1
			: 0;
	const typedCharacters = Math.min(
		CHARS,
		Math.max(0, Math.floor((mainFrame - T_TYPE_START) / FPC) + 1),
	);
	const typedText =
		mainFrame < T_TYPE_START ? "" : URL_TEXT.slice(0, typedCharacters);
	const settledCursorX = TEXT_START_X + CHARS * CHAR_WIDTH;
	const focusOriginX = interpolate(
		mainFrame,
		[T_FOCUS, T_TYPE_END, T_HOLD_END, T_MOVE_END],
		[TEXT_START_X, settledCursorX, settledCursorX, BROWSER_WIDTH / 2],
		{
			...clamp,
			easing: Easing.bezier(0.2, 0.9, 0.2, 1),
		},
	);
	const typingZoom = interpolate(
		mainFrame,
		[T_FOCUS, T_TYPE_END, T_HOLD_END, T_MOVE_END],
		[1, 2.2, 2.2, 1],
		{
			...clamp,
			easing: Easing.bezier(0.2, 0.9, 0.2, 1),
		},
	);
	const browserCloseScaleX = interpolate(
		mainFrame,
		[T_BROWSER_CLOSE_START, T_BROWSER_CLOSE_END],
		[1, 0.96],
		{...clamp, easing: Easing.in(Easing.cubic)},
	);
	const browserCloseScaleY = interpolate(
		mainFrame,
		[T_BROWSER_CLOSE_START, T_BROWSER_CLOSE_END],
		[1, 0.9],
		{...clamp, easing: Easing.in(Easing.cubic)},
	);
	const browserCloseTranslateY = interpolate(
		mainFrame,
		[T_BROWSER_CLOSE_START, T_BROWSER_CLOSE_END],
		[0, -34],
		{...clamp, easing: Easing.in(Easing.cubic)},
	);
	const browserOpacity = interpolate(
		mainFrame,
		[T_BROWSER_CLOSE_START, T_BROWSER_CLOSE_END],
		[1, 0],
		{...clamp, easing: Easing.in(Easing.cubic)},
	);
	const pointerScale = interpolate(
		mainFrame,
		[T_MOVE_END, T_MOVE_END + 5, T_MOVE_END + 10],
		[1, 1.35, 1.2],
		{...clamp},
	);
	const pointerOpacity = interpolate(
		mainFrame,
		[T_MOVE_END - 1, T_MOVE_END + 2, T_MOVE_END + 9, T_MOVE_END + 14],
		[0, 1, 1, 0],
		{...clamp},
	);
	const bgScale = interpolate(mainFrame, [0, T_FOCUS], [0.92, 1.04], {
		...clamp,
		easing: Easing.out(Easing.quad),
	});
	const bgOpacity = interpolate(mainFrame, [0, T_FOCUS], [0.65, 1], {
		...clamp,
		easing: Easing.out(Easing.quad),
	});
	const browserFloat = interpolate(mainFrame, [0, T_FOCUS], [34, 0], {
		...clamp,
		easing: Easing.out(Easing.cubic),
	});
	const videoOpacity = interpolate(
		mainFrame,
		[T_VIDEO_PLAY_START, T_VIDEO_REVEAL_END],
		[0, 1],
		{...clamp},
	);
	const contentOpacity = interpolate(
		mainFrame,
		[T_CONTENT_WHITE_START, T_CONTENT_WHITE_END],
		[1, 0],
		{...clamp},
	);
	const contentWhiteOpacity =
		mainFrame <= T_CONTENT_WHITE_END
			? interpolate(
					mainFrame,
					[T_CONTENT_WHITE_START, T_CONTENT_WHITE_END],
					[0, 1],
					{...clamp},
				)
			: interpolate(
					mainFrame,
					[T_VIDEO_PLAY_START, T_VIDEO_REVEAL_END],
					[1, 0],
					{...clamp},
				);
	const fullWhiteOpacity =
		mainFrame < T_BROWSER_CLOSE_START
			? 0
			: mainFrame <= T_BROWSER_CLOSE_END
				? interpolate(
						mainFrame,
						[T_BROWSER_CLOSE_START, T_BROWSER_CLOSE_END],
						[0, 1],
						{...clamp},
					)
				: 1;
	const tvWhiteScaleY =
		mainFrame < T_FADE_START
			? 1
			: interpolate(mainFrame, [T_FADE_START, T_TV_LINE_END], [1, 0.035], {
					...clamp,
					easing: Easing.in(Easing.cubic),
				});
	const tvWhiteScaleX =
		mainFrame < T_TV_LINE_END
			? 1
			: interpolate(mainFrame, [T_TV_LINE_END, T_TV_OFF_END], [1.04, 0], {
					...clamp,
					easing: Easing.in(Easing.cubic),
				});
	const tvBlackOpacity = interpolate(mainFrame, [T_FADE_START, T_TV_OFF_END], [0, 1], {
		...clamp,
		easing: Easing.in(Easing.cubic),
	});
	const outroTypedCharacters = Math.min(
		OUTRO_TEXT.length,
		Math.max(0, Math.floor((mainFrame - T_OUTRO_TYPE_START) / OUTRO_FPC) + 1),
	);
	const outroText =
		mainFrame < T_OUTRO_TYPE_START ? "" : OUTRO_TEXT.slice(0, outroTypedCharacters);
	const outroOpacity =
		mainFrame < T_OUTRO_TYPE_START
			? 0
			: mainFrame <= T_OUTRO_HOLD_END
				? 1
				: interpolate(mainFrame, [T_OUTRO_HOLD_END, T_OUTRO_FADE_END], [1, 0], {
						...clamp,
						easing: Easing.out(Easing.cubic),
					});
	const outroCaretOpacity =
		mainFrame >= T_OUTRO_TYPE_START &&
		mainFrame <= T_OUTRO_HOLD_END &&
		Math.floor(mainFrame / 8) % 2 === 0
			? 1
			: 0;
	const caretOpacity =
		mainFrame >= T_TYPE_START && mainFrame <= T_MOVE_END && Math.floor(mainFrame / 8) % 2 === 0
			? 1
			: 0;

	return (
		<AbsoluteFill
			style={{
				backgroundColor: "#f5f5f7",
				fontFamily: BODY_FONT,
				justifyContent: "center",
				alignItems: "center",
				overflow: "hidden",
			}}
		>
			<div
				style={{
					position: "absolute",
					inset: 0,
					backgroundColor: "#ffffff",
					opacity: introOpacity,
					display: "flex",
					alignItems: "center",
					justifyContent: "center",
					pointerEvents: "none",
				}}
			>
				<div
					style={{
						display: "flex",
						alignItems: "center",
						fontFamily: TITLE_FONT,
						fontSize: 44,
						fontWeight: 700,
						letterSpacing: -0.8,
						color: "#0f172a",
					}}
				>
					<span>{introText}</span>
					<span
						style={{
							width: 3,
							height: 42,
							backgroundColor: "#0f172a",
							marginLeft: 4,
							borderRadius: 2,
							opacity: introCaretOpacity,
						}}
					/>
				</div>
			</div>

			<div
				style={{
					position: "absolute",
					inset: 0,
					background:
						"radial-gradient(circle at 50% 34%, rgba(139, 164, 255, 0.28) 0%, rgba(158, 188, 255, 0.16) 22%, rgba(245,245,247,0) 62%)",
					transform: `scale(${bgScale})`,
					opacity: bgOpacity,
				}}
			/>

			<div
				style={{
					width: BROWSER_WIDTH,
					height: BROWSER_HEIGHT,
					transform: `translateY(${browserFloat + browserCloseTranslateY}px) scale(${typingZoom}) scaleX(${browserCloseScaleX}) scaleY(${browserCloseScaleY})`,
					transformOrigin: `${focusOriginX}px 152px`,
					willChange: "transform",
					position: "relative",
					opacity: browserOpacity,
				}}
			>
				<div
					style={{
						width: "100%",
						height: "100%",
						borderRadius: 48,
						backgroundColor: "#ffffff",
						boxShadow:
							"0 60px 160px rgba(17, 24, 39, 0.18), 0 18px 40px rgba(17, 24, 39, 0.08)",
						overflow: "hidden",
						border: "1px solid rgba(15, 23, 42, 0.06)",
						position: "relative",
					}}
				>
					<div
						style={{
							padding: "28px 30px 26px",
							background:
								"linear-gradient(180deg, #fafafc 0%, #f2f2f5 100%)",
							borderBottom: "1px solid rgba(15, 23, 42, 0.06)",
							display: "flex",
							flexDirection: "column",
							gap: 22,
						}}
					>
						<div
							style={{
								display: "flex",
								alignItems: "center",
								justifyContent: "space-between",
							}}
						>
							<div style={{display: "flex", gap: 10}}>
								{["#ff5f57", "#febc2e", "#28c840"].map((color) => (
									<div
										key={color}
										style={{
											width: 14,
											height: 14,
											borderRadius: "50%",
											backgroundColor: color,
										}}
									/>
								))}
							</div>
							<div
								style={{
									padding: "10px 20px",
									borderRadius: 18,
									backgroundColor: "rgba(255, 255, 255, 0.88)",
									color: "#475569",
									fontSize: 18,
									fontWeight: 600,
									boxShadow: "inset 0 0 0 1px rgba(148, 163, 184, 0.15)",
								}}
							>
								Busqueda de viajes
							</div>
							<div style={{width: 64}} />
						</div>

						<div
							style={{
								display: "flex",
								alignItems: "center",
								justifyContent: "center",
								gap: 14,
							}}
						>
							{["←", "→"].map((icon) => (
								<div
									key={icon}
									style={{
										width: 42,
										height: 42,
										borderRadius: 21,
										backgroundColor: "#ffffff",
										color: "#64748b",
										display: "flex",
										alignItems: "center",
										justifyContent: "center",
										fontSize: 20,
										boxShadow: "0 1px 2px rgba(15, 23, 42, 0.05)",
									}}
								>
									{icon}
								</div>
							))}

							<div
								style={{
									width: ADDRESS_BAR_WIDTH,
									height: 56,
									borderRadius: 28,
									backgroundColor: "#ffffff",
									boxShadow:
										"0 4px 16px rgba(15, 23, 42, 0.06), inset 0 0 0 1px rgba(148, 163, 184, 0.15)",
									padding: "0 16px 0 20px",
									display: "flex",
									alignItems: "center",
									justifyContent: "space-between",
								}}
							>
								<div
									style={{
										display: "flex",
										alignItems: "center",
										gap: 14,
										minWidth: 0,
									}}
								>
									<span style={{fontSize: 20, lineHeight: 1}}>🔒</span>
									<div
										style={{
											width: 1,
											height: 24,
											backgroundColor: "rgba(148, 163, 184, 0.35)",
										}}
									/>
									<div
										style={{
											display: "flex",
											alignItems: "center",
											fontFamily: BODY_FONT,
											fontSize: 24,
											color: "#111827",
											minWidth: 0,
										}}
									>
										<span>{typedText}</span>
										<span
											style={{
												width: 2,
												height: 26,
												backgroundColor: "#2563eb",
												marginLeft: 2,
												borderRadius: 2,
												opacity: caretOpacity,
											}}
										/>
									</div>
								</div>

								<div
									style={{
										width: 40,
										height: 40,
										borderRadius: 20,
										background:
											"linear-gradient(180deg, #0f172a 0%, #111827 100%)",
										color: "#ffffff",
										display: "flex",
										alignItems: "center",
										justifyContent: "center",
										fontSize: 18,
										boxShadow: "0 10px 24px rgba(15, 23, 42, 0.18)",
										flexShrink: 0,
									}}
								>
									↵
								</div>
							</div>
						</div>
					</div>

					<div
						style={{
							height: BROWSER_HEIGHT - 150,
							padding: "42px 38px 40px",
							background:
								"linear-gradient(180deg, #fbfcff 0%, #f8fafc 52%, #eff4ff 100%)",
							display: "flex",
							flexDirection: "column",
							gap: 26,
							position: "relative",
							overflow: "hidden",
						}}
					>
						<div
							style={{
								display: "flex",
								flexDirection: "column",
								gap: 26,
								flex: 1,
								opacity: contentOpacity,
							}}
						>
							<div
								style={{
									width: 300,
									height: 12,
									borderRadius: 999,
									background:
										"linear-gradient(90deg, rgba(191, 219, 254, 0.85) 0%, rgba(226, 232, 240, 0.28) 100%)",
									alignSelf: "center",
								}}
							/>

							<div
								style={{
									borderRadius: 38,
									padding: "42px 36px",
									background:
										"radial-gradient(circle at top left, rgba(96, 165, 250, 0.34) 0%, rgba(129, 140, 248, 0.12) 28%, rgba(255, 255, 255, 0.98) 76%)",
									boxShadow: "inset 0 0 0 1px rgba(148, 163, 184, 0.12)",
									display: "flex",
									flexDirection: "column",
									gap: 24,
								}}
							>
								<div
									style={{
										fontSize: 24,
										fontWeight: 700,
										letterSpacing: 2.2,
										textTransform: "uppercase",
										color: "#2563eb",
										fontFamily: TITLE_FONT,
									}}
								>
									Desde Viajes Ukiyo
								</div>
								<div
									style={{
										fontSize: 78,
										lineHeight: 0.96,
										letterSpacing: -3.8,
										fontWeight: 700,
										color: "#0f172a",
										fontFamily: TITLE_FONT,
									}}
								>
									Busca tu
									<br />
									proxima escapada.
								</div>
								<div
									style={{
										fontSize: 28,
										lineHeight: 1.35,
										color: "#475569",
										maxWidth: 620,
									}}
								>
									Viajeros expertos que conocen cada esquina del pais quieren
									ayudarte con tu proxima aventura.
								</div>
								<div style={{display: "flex", gap: 16}}>
									<div
										style={{
											padding: "16px 24px",
											borderRadius: 999,
											backgroundColor: "#0f172a",
											color: "#ffffff",
											fontSize: 20,
											fontWeight: 600,
										}}
									>
										Explorar viajes
									</div>
									<div
										style={{
											padding: "16px 24px",
											borderRadius: 999,
											backgroundColor: "rgba(255,255,255,0.86)",
											color: "#0f172a",
											fontSize: 20,
											fontWeight: 600,
											boxShadow:
												"inset 0 0 0 1px rgba(148, 163, 184, 0.22)",
										}}
									>
										Ver story
									</div>
								</div>
							</div>

							<div
								style={{
								display: "flex",
								flex: 1,
								flexDirection: "column",
								gap: 16,
							}}
						>
							{infoCards.map((card) => (
								<div
									key={card.label}
									style={{
										borderRadius: 30,
										padding: "28px 26px",
										background: card.tone,
										boxShadow:
											"0 12px 28px rgba(15, 23, 42, 0.06), inset 0 0 0 1px rgba(148, 163, 184, 0.12)",
										display: "flex",
										alignItems: "center",
										gap: 18,
									}}
								>
									<div
										style={{
											width: 56,
											height: 56,
											borderRadius: 18,
											backgroundColor: "#ffffff",
											boxShadow: "0 6px 16px rgba(15, 23, 42, 0.08)",
											flexShrink: 0,
											display: "flex",
											alignItems: "center",
											justifyContent: "center",
										}}
									>
										<CardIcon icon={card.icon} />
									</div>
									<div style={{display: "flex", flexDirection: "column", gap: 8}}>
										<div
											style={{
												fontSize: 30,
												fontWeight: 700,
												letterSpacing: -1,
												color: "#0f172a",
												fontFamily: TITLE_FONT,
											}}
										>
											{card.label}
										</div>
										<div
											style={{
												fontSize: 21,
												lineHeight: 1.35,
												color: "#64748b",
											}}
										>
											{card.copy}
										</div>
									</div>
								</div>
							))}
						</div>
						</div>

						<div
							style={{
								position: "absolute",
								inset: 0,
								overflow: "hidden",
								opacity: videoOpacity,
								backgroundColor: "#ffffff",
							}}
						>
							<Sequence from={T_VIDEO_PLAY_START}>
								<Video
									src={staticFile(VIDEO_FILE_NAME)}
									muted
									style={{
										position: "absolute",
										width: "100%",
										height: "auto",
										left: 0,
										top: "50%",
										transform: "translateY(-50%)",
										backgroundColor: "#ffffff",
									}}
								/>
							</Sequence>
							<div
								style={{
									position: "absolute",
									inset: 0,
									backgroundColor: "#ffffff",
									opacity: contentWhiteOpacity,
								}}
							/>
						</div>
					</div>

					<div
						style={{
							position: "absolute",
							inset: 0,
							background:
								"radial-gradient(ellipse at center, transparent 55%, rgba(0,0,0,0.18) 100%)",
							pointerEvents: "none",
						}}
					/>
				</div>

				<div
					style={{
						position: "absolute",
						left: SEARCH_BUTTON_CENTER_X + 10,
						top: SEARCH_BUTTON_CENTER_Y + 16,
						transform: `scale(${pointerScale})`,
						transformOrigin: "center center",
						fontSize: 52,
						lineHeight: 1,
						opacity: pointerOpacity,
						filter: "drop-shadow(0 10px 14px rgba(15, 23, 42, 0.18))",
						pointerEvents: "none",
					}}
				>
					<Img
						src={staticFile("seleccione.png")}
						style={{
							width: 76,
							height: 76,
							objectFit: "contain",
						}}
					/>
				</div>
			</div>

			<div
				style={{
					position: "absolute",
					inset: 0,
					backgroundColor: "#000000",
					opacity: tvBlackOpacity,
					pointerEvents: "none",
				}}
			/>
			<div
				style={{
					position: "absolute",
					inset: 0,
					display: "flex",
					alignItems: "center",
					justifyContent: "center",
					backgroundColor: "#000000",
					opacity: outroOpacity,
					pointerEvents: "none",
				}}
			>
				<div
					style={{
						display: "flex",
						alignItems: "center",
						fontFamily: TITLE_FONT,
						fontSize: 42,
						fontWeight: 700,
						letterSpacing: -0.8,
						color: "#ffffff",
					}}
				>
					<span>{outroText}</span>
					<span
						style={{
							width: 3,
							height: 40,
							backgroundColor: "#ffffff",
							marginLeft: 4,
							borderRadius: 2,
							opacity: outroCaretOpacity,
						}}
					/>
				</div>
			</div>
			<div
				style={{
					position: "absolute",
					inset: 0,
					backgroundColor: "#ffffff",
					opacity: fullWhiteOpacity,
					transform: `scaleX(${tvWhiteScaleX}) scaleY(${tvWhiteScaleY})`,
					transformOrigin: "center center",
					pointerEvents: "none",
				}}
			/>
		</AbsoluteFill>
	);
};
