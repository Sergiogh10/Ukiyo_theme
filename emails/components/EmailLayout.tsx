import { Html, Head, Preview, Body, Container, Tailwind, Font } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface EmailLayoutProps {
  children: React.ReactNode;
  previewText?: string;
}

export const EmailLayout = ({ children, previewText }: EmailLayoutProps) => {
  return (
    <Html>
      <Head>
        <Font
          fontFamily="Rowdies"
          fallbackFontFamily="sans-serif"
          webFont={{
            url: '/static/fonts/Rowdies-Regular.ttf',
            format: 'truetype',
          }}
          fontWeight={400}
          fontStyle="normal"
        />
        <Font
          fontFamily="Rowdies"
          fallbackFontFamily="sans-serif"
          webFont={{
            url: '/static/fonts/Rowdies-Bold.ttf',
            format: 'truetype',
          }}
          fontWeight={700}
          fontStyle="normal"
        />
        <Font
          fontFamily="Rowdies"
          fallbackFontFamily="sans-serif"
          webFont={{
            url: '/static/fonts/Rowdies-Light.ttf',
            format: 'truetype',
          }}
          fontWeight={300}
          fontStyle="normal"
        />
        <style>
          {`
            ::selection { background-color: ${theme.colors.accentSoft}; color: ${theme.colors.textMain}; }
          `}
        </style>
      </Head>
      {previewText && <Preview>{previewText}</Preview>}
      <Body style={mainStyle}>
        <Container style={containerStyle}>
          {children}
        </Container>
      </Body>
    </Html>
  );
};

const mainStyle = {
  backgroundColor: theme.colors.surface,
  fontFamily: theme.fonts.main,
  color: theme.colors.textMain,
  margin: '0',
  padding: '40px 0',
  WebkitFontSmoothing: 'antialiased',
};

const containerStyle = {
  backgroundColor: theme.colors.background,
  margin: '0 auto',
  padding: '0', // No padding at the top level, header/footer will handle their own spacing
  borderRadius: theme.radius.md,
  maxWidth: '600px',
  overflow: 'hidden',
  boxShadow: '0 4px 12px rgba(0, 0, 0, 0.05)',
  border: `1px solid ${theme.colors.border}`,
};

export default EmailLayout;
