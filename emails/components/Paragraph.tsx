import { Text } from '@react-email/components';
import * as React from 'react';
import { theme } from '../styles/theme';

interface ParagraphProps {
  children: React.ReactNode;
  style?: React.CSSProperties;
  secondary?: boolean;
}

export const Paragraph = ({ children, style, secondary }: ParagraphProps) => {
  return (
    <Text style={{ ...baseStyle, color: secondary ? theme.colors.textSecondary : theme.colors.textMain, ...style }}>
      {children}
    </Text>
  );
};

const baseStyle = {
  fontSize: '16px',
  lineHeight: '26px',
  color: theme.colors.textMain,
  margin: '0 0 20px 0',
  fontFamily: theme.fonts.main,
};

export default Paragraph;
